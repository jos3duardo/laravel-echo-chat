/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Pusher.logToConsole = true;

const app = new Vue({
    el: '#app',
    delimiters: ['[[',']]'],
    data: {
        roomId: roomId,
        userId: userId,
        content: '',
        users: [],
        messages: []
    },
    mounted(){
      Echo.join(`room.${roomId}`)
          .listen('SendMessage',(data) => {
              this.messages.push(data)
          }).here( (users) => {
            this.users = users;
      }).joining((user) => {
          this.users.push(user);
          jQuery.notify(`<strong>${user.name}</strong> entrou no chat.`, {allow_dismiss: true});
      }).leaving((user) => {
          this.users.$remove(user);
      })
    },
    methods: {
        sendMessage(){
            axios.post(`/chat/rooms/${this.roomId}/message`,{
                'content': this.content
            })
            .then(function (response) {
                // console.log(app);

            })
            .catch(function (error) {
                console.log(error);
            });
        },
        createPhoto(email){
            return `http://www.gravatar.com/avatar/${md5(email)}.jpg`;
        }

    }
});

// console.log(this.users, roomId)
