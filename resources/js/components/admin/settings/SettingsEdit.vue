<template>
  <div class="box px-4 py-4">
      <div class="row">
          <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Телефон</label>
                    <input v-model="tel" type="text" class="form-control">
                </div>
          </div>
          <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <label class="form-label">E-mail для уведомлений</label>
                    <input v-model="email_for_notifications" type="text" class="form-control">
                </div>
          </div>
      </div>
      <div class="mb-3">
          <label class="form-label">Адрес</label>
          <input v-model="address" type="text" class="form-control">
      </div>

      <button @click="updateSettings()" class="btn btn-primary">Сохранить</button>
  </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                tel: '',
                email_for_notifications: '',
                address: '',
            };
        },
        created() {
          this.getSettings()
        },
        methods: {
            getSettings() {
                axios
                .get(`/_admin/settings`)
                .then((response => {
                    this.tel = response.data.tel
                    this.email_for_notifications = response.data.email_for_notifications
                    this.address = response.data.address
                }));
            },
            updateSettings() {
                if(this.tel && this.tel.length > 0) {
                    axios
                    .put('/_admin/settings', {
                        tel: this.tel,
                        email_for_notifications: this.email_for_notifications,
                        address: this.address
                    })
                    .then(response => (
                        window.location.href = '/admin/settings'
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