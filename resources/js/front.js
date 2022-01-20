import Vue from 'vue'

Vue.component('quiz', require('./components/Quiz.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('about-form', require('./components/AboutForm.vue').default);

const app = new Vue({
    el: '#app'
});