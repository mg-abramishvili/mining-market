<template>
    <div class="box px-4 py-4">

        <div class="mb-3">
            <label class="form-label">Текст</label>
            <ckeditor :editor="editor" v-model="text" :config="editorConfig"></ckeditor>
        </div>

        <button @click="updatePolicy()" class="btn btn-primary">Сохранить</button>
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
          this.getPolicy()
        },
        methods: {
            getPolicy() {
                axios
                .get(`/_admin/policy`)
                .then((response => {
                    this.text = response.data.text
                }));
            },
            updatePolicy() {
                if(this.text && this.text.length > 0) {
                    axios
                    .put('/_admin/policy', {
                        text: this.text,
                    })
                    .then(response => (
                        window.location.href = '/admin/policy'
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