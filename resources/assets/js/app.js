
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
require('./bootstrap');
window.Vue = require('vue');
const moment = require('moment');
import Glide from '@glidejs/glide';
import iziModal from 'izimodal/js/iziModal';
import iziToast from 'izitoast';
import Cropper from 'cropperjs';
import { Croppie } from 'croppie/croppie';
import VueCroppie from 'vue-croppie'
import 'fullcalendar';
require('moment/locale/es');
require('bootstrap/js/dist/modal');

window.Glide = Glide;
$.fn.iziModal = iziModal;
window.iziToast = iziToast;
window.Cropper = Cropper;
// require('default-passive-events');
/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
Vue.use(VueCroppie);
Vue.use(require('vue-moment'), {
    moment
});
// Vue.component('vue-picture-swipe', VuePictureSwipe);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('card-servicios', require('./components/CardServicesComponent.vue'));
Vue.component('card-productos', require('./components/CardProductsComponent.vue'));
Vue.component('images-album', require('./components/ImageComponent.vue'));
Vue.component('upload-images-album', require('./components/UploadImagesAlbumComponent.vue'));
Vue.component('ej', require('./components/Ejemplo.vue'));
Vue.component('albums-list', require('./components/AlbumsComponent.vue'));
Vue.component('noticias', require('./components/NoticiasComponent.vue'));
Vue.component('item-evento', require('./components/ItemEventsComponent.vue'));
Vue.component('upload-image-profile', require('./components/UploadImageProfileComponent.vue'));
const app = new Vue({
    el: '#app',
});
