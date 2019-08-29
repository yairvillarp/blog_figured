require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import moment from 'moment'
Vue.use(VueRouter)

let routes = [
    { path: '/', component: require('./components/Articles.vue').default },
    { path: '/article/:id', component: require('./components/Article.vue').default }
]

const router = new VueRouter({
    routes
})

Vue.filter('Date',function(created){
    return moment(created).format('MMMM Do YYYY');
});



Vue.component('navbar', require('./components/Navbar.vue').default);

const app = new Vue({
    el: '#app',
    router
});
