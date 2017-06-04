
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('easyform', require('./components/Form.vue'));
Vue.component('module', require('./components/Module.vue'));
Vue.component('banner', require('./components/Banner.vue'));
Vue.component('navbar', require('./components/Navbar.vue'));

const App = new Vue({
    el: '#app',
    methods: {
      go: function (route) {
        window.location.href = window.location.origin + route
      }
    },
    computed: {
      csrf: function () { return window.Laravel.csrfToken },

    }
});
