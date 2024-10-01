<template>
    <div class="relacionados">
      <h3>Contenido relacionado</h3>
      <div v-if="mensaje" class="alert alert-info">
        {{ mensaje }}
      </div>
      <div v-else class="row">
        <div class="col-md-3" v-for="relacionado in relacionados" :key="relacionado.id">
          <a @click.prevent="cargarPelicula(relacionado.id)">
            <img :src="relacionado.portada" :alt="relacionado.nombre" class="img-fluid rounded" />
            <p>{{ relacionado.nombre }}</p>
          </a>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: ['nombrePelicula'],
    data() {
      return {
        relacionados: [],
        mensaje: ''
      };
    },
    mounted() {
      this.obtenerRelacionados();
    },
    methods: {
      obtenerRelacionados() {
        axios.get(`/api/peliculas-relacionadas/${this.nombrePelicula}`)
          .then(response => {
            if (response.data.mensaje) {
              this.mensaje = response.data.mensaje;
            } else {
              this.relacionados = response.data;
            }
          })
          .catch(error => {
            console.error('Error al obtener películas relacionadas:', error);
          });
      },
      cargarPelicula(id) {
        // Redirigir a la vista de contenido de la película seleccionada
        window.location.href = `/contenido/${id}`;
      }
    }
  }
  </script>
  
  <style scoped>
  .relacionados img {
    cursor: pointer;
    margin-bottom: 10px;
  }
  </style>
  