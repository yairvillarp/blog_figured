require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import moment from 'moment'
Vue.use(VueRouter)

let routes = [
    { path: '/', component: require('./components/admin/Articles.vue').default },
    { path: '/article/:id', component: require('./components/admin/Article.vue').default }
]

const router = new VueRouter({
    routes
})

Vue.filter('Date',function(created){
    return moment(created).format('MMMM Do YYYY');
});


Vue.component('navbar', require('./components/admin/Navbar.vue').default);
Vue.component('sidebar', require('./components/admin/Sidebar.vue').default);

const app = new Vue({
    el: '#app',
    router
});
