<template>
  <div class="container mt-4">
    <h2>Reportar un problema</h2>
    
    <form @submit.prevent="enviarReporte">
      <div class="form-group">
        <label for="descripcion">Descripción del problema</label>
        <textarea class="form-control" id="descripcion" v-model="descripcion" required></textarea>
      </div>

      <!-- Tipo de problema -->
      <div class="form-group">
        <label for="tipo_de_problema">Tipo de problema</label>
        <select class="form-control" id="tipo_de_problema" v-model="tipoDeProblema" required>
          <option value="Audio">Audio</option>
          <option value="Video">Video</option>
          <option value="Subtítulos">Subtítulos</option>
          <option value="Otro">Otro</option>
        </select>
      </div>

      <!-- Minuto del problema -->
      <div class="form-group">
        <label for="minuto_del_problema">Minuto del problema</label>
        <input type="number" class="form-control" id="minuto_del_problema" v-model="minutoDelProblema" required />
      </div>

      <!-- Botones -->
      <div class="mt-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" @click="cancelar">Cancelar</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['idpelicula', 'nombre_pelicula'],  
  data() {
    return {
      descripcion: '',
      tipoDeProblema: '',
      minutoDelProblema: '',
    };
  },
  methods: {
 
    enviarReporte() {
      const reporte = {
        idpelicula: this.idpelicula,          
        nombre_pelicula: this.nombre_pelicula, 
        descripcion: this.descripcion,
        tipo_de_problema: this.tipoDeProblema,
        minuto_del_problema: this.minutoDelProblema
      };

      axios.post('/api/reportes', reporte)
        .then(response => {
          alert('Reporte enviado exitosamente');
          this.resetFormulario();
        })
        .catch(error => {
          console.error('Error al enviar el reporte:', error);
        });
    },
    cancelar() {
      this.resetFormulario();
      this.$emit('cerrar');
    },
    resetFormulario() {
      this.descripcion = '';
      this.tipoDeProblema = '';
      this.minutoDelProblema = '';
    }
  }
};
</script>

<style scoped>
.container {
  max-width: 600px;
  margin: auto;
}
</style>
