import Vue from 'vue'

import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );

Vue.component('quiz', require('./components/Quiz.vue').default);

const app = new Vue({
    el: '#app'
});