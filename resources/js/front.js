import Vue from 'vue'

Vue.component('quiz', require('./components/Quiz.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);

const app = new Vue({
    el: '#app'
});