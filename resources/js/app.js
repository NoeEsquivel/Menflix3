import Vue from 'vue';
import Info from './components/info.vue';
import Actor from './components/actor.vue';
import Relacionados from './components/relacionados.vue';
import Reporte from './components/reporte.vue';
import axios from 'axios';

new Vue({
    el: '#app', // Controla la sección del DOM con este ID
    data() {
        return {
            keeps: [] // Aquí se pueden manejar los datos de reportes o cualquier otro conjunto de datos que necesites.
        };
    },
    components: {
        Info,
        Actor,
        Relacionados,
        Reporte,
    },
    created() {
        this.getKeeps(); // Llamada inicial para cargar datos si es necesario
    },
    methods: {
        // Método para obtener datos, puede ser usado para cualquier llamada a APIs.
        getKeeps() {
            axios.get('reporte').then(response => {
                this.keeps = response.data;
            });
        }
    }
});