
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
require('./bootstrap');
window.Vue = require('vue');
const moment = require('moment');
import Glide from '@glidejs/glide';
import iziToast from 'izitoast';
import { Croppie } from 'croppie/croppie';
import 'fullcalendar';
require('bootstrap/js/dist/modal');
import 'bootstrap/js/dist/util';
import 'bootstrap/js/dist/dropdown';
import 'bootstrap/js/dist/tab';
require('moment/locale/es');


window.Glide = Glide;
window.iziToast = iziToast;
// require('default-passive-events');
/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
Vue.use(require('vue-moment'), {
    moment
});
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('card-servicios', require('./components/CardServicesComponent.vue'));
Vue.component('card-productos', require('./components/CardProductsComponent.vue'));
Vue.component('list-images-album', require('./components/ListImagesAlbumComponent.vue'));
Vue.component('upload-images-album', require('./components/UploadImagesAlbumComponent.vue'));
Vue.component('create-album', require('./components/CreateAlbumComponent.vue'));
Vue.component('list-album', require('./components/ListAlbumComponent.vue'));
Vue.component('noticias', require('./components/NoticiasComponent.vue'));
Vue.component('item-evento', require('./components/ItemEventsComponent.vue'));

const app = new Vue({
    el: '#app',
});
