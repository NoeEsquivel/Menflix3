import Vue from 'vue';
import VueRouter from 'vue-router';
import Inicio from './components/inicio.vue';
import Contenido from './components/contenido.vue';

Vue.use(VueRouter);

const routes = [
    { 
        path: '/', 
        name: 'inicio', // Añadimos el nombre a la ruta
        component: Inicio 
    },
    { 
        path: '/contenido/:id', 
        name: 'contenido', // Añadimos el nombre a la ruta
        component: Contenido, 
        props: true 
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    router,
    el: '#app',
});
