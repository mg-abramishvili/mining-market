<template>
    <div>
        <div class="box px-4 py-4 mb-4">
            <div class="box-tab-content">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <file-pond
                            name="photo"
                            ref="photo"
                            label-idle="Выбрать фото..."
                            v-bind:allow-multiple="false"
                            v-bind:allow-reorder="false"
                            accepted-file-types="image/jpeg, image/png"
                            :server="server"
                            v-bind:files="filepond_photo_edit"
                        />
                    </div>
                    <div class="col-12 col-lg-6">
                        <file-pond
                            name="screenshot"
                            ref="screenshot"
                            label-idle="Выбрать скриншот..."
                            v-bind:allow-multiple="false"
                            v-bind:allow-reorder="false"
                            accepted-file-types="image/jpeg, image/png"
                            :server="server"
                            v-bind:files="filepond_screenshot_edit"
                        />
                    </div>
                </div>
            </div>
            <button :disabled="updateReview_button == false"  @click="updateReview(review.id)" class="btn btn-primary">Сохранить</button>
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
        props: ['review_id'],
        data() {
            return {
                review: {},

                photo: '',
                screenshot: '',

                filepond_photo: [],
                filepond_photo_edit: [],

                filepond_screenshot: [],
                filepond_screenshot_edit: [],
                
                updateReview_button: false,

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
            this.getReview()
        },
        methods: {
            getReview() {
                axios
                .get(`/_admin/review/${this.review_id}`)
                .then((response => {
                    this.review = response.data
                    
                    if(response.data.photo) {
                        this.filepond_photo_edit = [
                            {
                                source: response.data.photo,
                                options: {
                                    type: 'local',
                                }
                            }
                        ]
                    }
                    if(response.data.screenshot) {
                        this.filepond_screenshot_edit = [
                            {
                                source: response.data.screenshot,
                                options: {
                                    type: 'local',
                                }
                            }
                        ]
                    }
                }));
            },
            updateCategory(id) {
                if(document.getElementsByName("photo")[0]) {
                    this.photo = document.getElementsByName("photo")[0].value
                }
                if(document.getElementsByName("screenshot")[0]) {
                    this.screenshot = document.getElementsByName("screenshot")[0].value
                }
                if(this.photo && this.photo.length > 0 && this.screenshot && this.screenshot.length > 0) {
                    this.updateReview_button = false
                    axios
                    .put(`/_admin/review/${id}`, { id: id, photo: this.photo, screenshot: this.screenshot })
                    .then(response => (
                        window.location.href = '/admin/reviews'
                    ))
                    .catch((error) => {
                        if(error.response) {
                            this.updateCategory_button = true
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