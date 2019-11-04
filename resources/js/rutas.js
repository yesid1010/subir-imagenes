import Vue from 'vue';
import VueRouter from 'vue-router';
import DetailImage from './views/DetailImage.vue';

Vue.use(VueRouter)


export default new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/home',
            name:'home',
            component : () => import('./views/HomeComponent.vue')
        },

        {
            path:'/myphotos',
            name:'myphotos',
            component : () => import('./views/PerfilComponent.vue')
        },
        {
            path:'/logins',
            name:'logins',
            component:() => import('./views/LoginComponent.vue')
        },
        {
            path:'/register',
            name:'register',
            component : () => import('./views/RegisterComponent.vue')
        },
        {
            path:'/imagen/:id',
            name:'imagen',
            component : DetailImage
        }
    ]
})
