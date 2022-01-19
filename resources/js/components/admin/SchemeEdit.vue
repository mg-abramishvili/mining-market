<template>
    <div>
        <div class="box px-4 py-4 mb-4">
            <div class="box-tab-content">
                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input v-model="name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <input v-model="text" type="text" class="form-control">
                </div>
            </div>
            <button :disabled="updateScheme_button == false"  @click="updateScheme(scheme.id)" class="btn btn-primary">Сохранить</button>
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
        props: ['scheme_id'],
        data() {
            return {
                scheme: {},

                name: '',
                text: '',
                
                updateScheme_button: true,

                moment: moment,
            };
        },
        created() {
            this.getScheme()
        },
        methods: {
            getScheme() {
                axios
                .get(`/_admin/scheme/${this.scheme_id}`)
                .then((response => {
                    this.scheme = response.data
                    this.name = response.data.name
                    this.text = response.data.text
                }));
            },
            updateScheme(id) {
                if(this.name && this.name.length > 0 && this.text && this.text.length > 0) {
                    this.updateScheme_button = false
                    axios
                    .put(`/_admin/scheme/${id}`, { id: id, name: this.name, text: this.text })
                    .then(response => (
                        window.location.href = '/admin/schemes'
                    ))
                    .catch((error) => {
                        if(error.response) {
                            this.updateScheme_button = true
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