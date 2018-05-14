
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

Vue.component('messages-board', require('./components/MessagesBoard.vue'));

const app = new Vue({
    el: '#messages-board',
    data: {
        messages: [],
        disabled: null,
    },
    mounted: function () {
        Echo.channel(`public_messages`)
            .listen('EmitScriptOutput', (e) => {
                this.messages.push(e.data);
            });
        window.axios.get('/messages')
            .then(function (response) {
                app.messages = response.data;
            });
   },
});

var form = document.getElementById('scan-repo');
form.addEventListener('submit', function(e) {
    e.preventDefault();
    window.axios.post(form.action);
});
