
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('entries', {
    template: '#tasks-template',
    props: ['entries', 'url'],
    methods: {
        editEntry: function(entry) {
            app.url = this.url;
            app.fillEntry.id = entry.id;
            app.fillEntry.url = entry.url;
            app.fillEntry.username = entry.username;
            app.fillEntry.password = entry.password;
            $("#edit-item").modal('show');
        }
    }
})

const app = new Vue({
    el: '#app',
    data: {
        fillEntry: {'id': '', 'url':'','username':'','password':''},
        url: ''
    }
});
