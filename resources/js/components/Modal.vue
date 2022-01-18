<template>
  <div class="modal" id="modal_1" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button @click="close_modal()" type="button" class="btn-close"></button>
		</div>
		<div class="modal-body">
		  <div v-if="success">
			<p>Заявка успешно отправлена!</p>
		  </div>
		  <div v-else>
			<div class="mb-3">
			  <label for="name" id="name_label" class="form-label">Имя</label>
			  <input v-model="name" id="name" type="text" class="form-control" placeholder="Иван Петров">
			</div>
			<div class="mb-3">
				<label for="tel" id="tel_label" class="form-label">Телефон</label>
				<input v-model="tel" id="tel" type="text" class="form-control" placeholder="+7 999 123-45-67">
			</div>
			<div class="mb-3">
			  <label for="message" class="form-label">Сообщение (не обязательно)</label>
			  <textarea v-model="message" id="message" type="text" class="form-control" placeholder="Сообщение"></textarea>
			</div>
			<div class="text-center">
				<button @click="saveLead()" class="btn btn-primary">Отправить</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
			  name: '',
			  tel: '',
			  message: '',
			  success: false
			};
		},
		methods: {
			close_modal() {
			  this.name = ''
			  this.tel = ''
			  this.message = ''
			  document.getElementById("modal_1").classList.remove("modal-show");
			  document.getElementsByClassName("modal-backdrop")[0].classList.remove("backdrop-show");
			},
			saveLead() {
				Array.from(document.getElementsByClassName('form-label')).forEach(label => {
					label.classList.remove('text-danger')
				})
				Array.from(document.getElementsByClassName('form-control')).forEach(input => {
					input.classList.remove('border-danger')
				})

			  axios
			  .post(`/lead`, { name: this.name, tel: this.tel, message: this.message })
			  .then((response => {
				  this.success = true
				  setTimeout(() => {
					this.success = false
					this.close_modal()
				  }, 2000)
			  }))
			  .catch((error) => {
				  if(error.response) {
					  for(var key in error.response.data.errors) {
						//   console.log(key)
						document.getElementById(key).classList.add('border-danger')
						document.getElementById(key + '_label').classList.add('text-danger')
					  }
				  }
			  });
			}
		},
	}
</script>