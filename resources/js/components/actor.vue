<template>
    <div class="actor-container">
      <h5>Actor Principal:</h5>
      <div @click="showBiography" @mouseover="showTooltip = true" @mouseleave="showTooltip = false" class="actor-photo-container">
        <img :src="foto" alt="Foto del actor" class="actor-photo">
        <p v-if="showTooltip" class="tooltip">Para más información del actor presiona aquí</p>
      </div>
      <div v-if="showBio" class="actor-bio">
        <h5>{{ protagonista }}</h5>
        <p>{{ biografia }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      protagonista: {
        type: String,
        required: true
      },
      foto: {
        type: String,
        required: true
      },
      biografia: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        showTooltip: false,
        showBio: false
      };
    },
    methods: {
      showBiography() {
        this.showBio = !this.showBio;
      }
    }
  };
  </script>
  
  <style scoped>
  .actor-container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .actor-photo-container {
    position: relative;
    cursor: pointer;
  }
  
  .actor-photo {
    width: 150px;
    height: auto;
    border-radius: 8px;
    transition: transform 0.2s ease;
  }
  
  .actor-photo:hover {
    transform: scale(1.05);
  }
  
  .tooltip {
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px;
    border-radius: 4px;
    font-size: 12px;
  }
  
  .actor-bio {
    margin-top: 20px;
    text-align: center;
    color: #fff;
  }
  </style>
  