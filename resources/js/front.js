import Vue from 'vue'

Vue.component('quiz', require('./components/Quiz.vue').default);

const app = new Vue({
    el: '#app'
});