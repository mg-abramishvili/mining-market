<template>
    <div class="box px-4 py-4">

        <div class="mb-3">
            <label class="form-label">Главный заголовок</label>
            <input v-model="title" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Строка 1</label>
            <input v-model="list_item_1" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Строка 2</label>
            <input v-model="list_item_2" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Строка 3</label>
            <input v-model="list_item_3" type="text" class="form-control">
        </div>

        <button @click="updateHero()" class="btn btn-primary">Сохранить</button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                title: '',
                list_item_1: '',
                list_item_2: '',
                list_item_3: '',
            };
        },
        created() {
          this.getHero()
        },
        methods: {
            getHero() {
                axios
                .get(`/_admin/hero`)
                .then((response => {
                    this.title = response.data.title
                    this.list_item_1 = response.data.list_item_1
                    this.list_item_2 = response.data.list_item_2
                    this.list_item_3 = response.data.list_item_3
                }));
            },
            updateHero() {
                if(this.title && this.title.length > 0) {
                    axios
                    .put('/_admin/hero', {
                        title: this.title,
                        list_item_1: this.list_item_1,
                        list_item_2: this.list_item_2,
                        list_item_3: this.list_item_3,
                    })
                    .then(response => (
                        window.location.href = '/admin/hero'
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