<template>
    <div>
        <div class="box px-4 py-4 mb-4">
            <div class="box-tab-content">
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <input v-model="text" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Иконка</label>
                    <file-pond
                        name="icon"
                        ref="icon"
                        label-idle="Выбрать фото..."
                        v-bind:allow-multiple="false"
                        v-bind:allow-reorder="false"
                        accepted-file-types="image/jpeg, image/png"
                        :server="server"
                        v-bind:files="filepond_icon_edit"
                    />
                </div>
            </div>
            <button :disabled="updateAdvantage_button == false"  @click="updateAdvantage(advantage.id)" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import vueFilePond from "vue-filepond";
    import "filepond/dist/filepond.min.css";
    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
    import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
    import FilePondPluginImagePreview from "filepond-plugin-image-preview";
    const FilePond = vueFilePond(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview
    );
    export default {
        props: ['advantage_id'],
        data() {
            return {
                advantage: {},

                icon: '',
                text: '',

                filepond_icon: [],
                filepond_icon_edit: [],
                
                updateAdvantage_button: true,

                server: {
                    remove(filename, load) {
                        load('1');
                    },
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        const formData = new FormData();
                        formData.append(fieldName, file, file.name);
                        const request = new XMLHttpRequest();
                        request.open('POST', '/_admin/file');
                        request.upload.onprogress = (e) => {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };
                        request.onload = function() {
                            if (request.status >= 200 && request.status < 300) {
                                load(request.responseText);
                            }
                            else {
                                error('oh no');
                            }
                        };
                        request.send(formData);
                        return {
                            abort: () => {
                                request.abort();
                                abort();
                            }
                        };
                    },
                    revert: (filename, load) => {
                        load(filename)
                    },
                    load: (source, load, error, progress, abort, headers) => {
                        var myRequest = new Request(source);
                        fetch(myRequest).then(function(response) {
                            response.blob().then(function(myBlob) {
                                load(myBlob)
                            });
                        });
                    },
                },
                moment: moment,
            };
        },
        created() {
            this.getAdvantage()
        },
        methods: {
            getAdvantage() {
                axios
                .get(`/_admin/advantage/${this.advantage_id}`)
                .then((response => {
                    this.advantage = response.data
                    this.text = response.data.text
                    
                    if(response.data.icon) {
                        this.filepond_icon_edit = [
                            {
                                source: response.data.icon,
                                options: {
                                    type: 'local',
                                }
                            }
                        ]
                    }
                }));
            },
            updateAdvantage(id) {
                if(document.getElementsByName("icon")[0]) {
                    this.icon = document.getElementsByName("icon")[0].value
                }
                if(this.icon && this.icon.length > 0 && this.text && this.text.length > 0) {
                    this.updateAdvantage_button = false
                    axios
                    .put(`/_admin/advantage/${id}`, { id: id, icon: this.icon, text: this.text })
                    .then(response => (
                        window.location.href = '/admin/advantages'
                    ))
                    .catch((error) => {
                        if(error.response) {
                            this.updateAdvantage_button = true
                            for(var key in error.response.data.errors){
                                console.log(key)
                                alert(key)
                            }
                        }
                    });
                } else {
                    alert('Заполните поля')
                }
            },
        },
    }
</script>