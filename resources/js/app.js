import Vue from 'vue'

import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );

Vue.component('prof-calc', require('./components/ProfCalc.vue').default);

const app = new Vue({
    el: '#app'
});