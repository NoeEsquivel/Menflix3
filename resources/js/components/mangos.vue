<template>
    <div class="card-group mt-4">
      <div v-for="pedido in pedidos" :key="pedido.id" class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ pedido.nombre_pedido }}</h5>
              <p class="card-text">Tipo: {{ pedido.tipo_fruta }}</p>
              <span class="fw-bold">Cantidad: {{ pedido.cantidad }}</span>
              <p class="card-text">Destino: {{ pedido.destino_pedido }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        pedidos: [] // Aquí almacenaremos los datos obtenidos de la API
      };
    },
    mounted() {
      console.log('Componente montado: llamando a fetchPedidos...');
      this.fetchPedidos(); // Llamar a la función cuando el componente se monte
    },
    methods: {
      async fetchPedidos() {
        try {
          const token = '7FEgwoxarqMEudPj1fXYj88A4N3fSo0VNZHQ22k6'; // PONER AQUI EL TOKEN
          console.log('Intentando obtener datos de la API...');
          const response = await axios.get('https://www.lahuertadelmango.com/api/pedidos', {
            headers: {
              Authorization: `Bearer ${token}`
            }
          });
          console.log('Respuesta de la API:', response.data); // Debug
          this.pedidos = response.data; // Asignar los datos obtenidos a la propiedad pedidos
        } catch (error) {
          console.error('Error al obtener los pedidos:', error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .card {
    width: 100%;
    margin-bottom: 20px;
    border: 2px solid red; /* Debug: Esto te ayudará a visualizar las cards */
  }
  </style>