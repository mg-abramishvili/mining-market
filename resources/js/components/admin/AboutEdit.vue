<template>
    <div class="box px-4 py-4">

        <div class="mb-3">
            <label class="form-label">Текст</label>
            <ckeditor :editor="editor" v-model="text" :config="editorConfig"></ckeditor>
        </div>

        <button @click="updateAbout()" class="btn btn-primary">Сохранить</button>
    </div>
</template>

<script>
    import axios from 'axios';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        data() {
            return {
                text: '',

                editor: ClassicEditor,
                editorData: '',
                editorConfig: {
                    toolbar: [ 'bold', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ],
                },
            };
        },
        created() {
          this.getAbout()
        },
        methods: {
            getAbout() {
                axios
                .get(`/_admin/about`)
                .then((response => {
                    this.text = response.data.text
                }));
            },
            updateAbout() {
                if(this.text && this.text.length > 0) {
                    axios
                    .put('/_admin/about', {
                        text: this.text,
                    })
                    .then(response => (
                        window.location.href = '/admin/about'
                    ))
                    .catch((error) => {
                        if(error.response) {
                            for(var key in error.response.data.errors){
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