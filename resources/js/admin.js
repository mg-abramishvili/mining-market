import Vue from 'vue'

window.moment = require('moment');
import moment from 'moment'

Vue.prototype.$moment = moment;
moment.locale('ru');

import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );

Vue.component('review-create', require('./components/admin/reviews/ReviewCreate.vue').default);
Vue.component('review-edit', require('./components/admin/reviews/ReviewEdit.vue').default);

Vue.component('hero-edit', require('./components/admin/HeroEdit.vue').default);
Vue.component('about-edit', require('./components/admin/AboutEdit.vue').default);
Vue.component('settings-edit', require('./components/admin/SettingsEdit.vue').default);

const app = new Vue({
    el: '#app'
});