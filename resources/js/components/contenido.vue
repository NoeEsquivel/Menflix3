<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link class="navbar-brand" :to="{ name: 'inicio' }">Menflix</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <router-link class="nav-link" to="#">Películas</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="#">Series</router-link>
                        </li>
                    </ul>
                    <form class="d-flex" @submit.prevent="buscar">
                        <input v-model="query" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" required />
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Contenido de la película -->
        <div class="container content-container">
            <div class="row">
                <div class="col-md-4">
                    <img :src="pelicula.portada" :alt="pelicula.nombre" class="movie-poster" />
                </div>
                <div class="col-md-8 movie-info">
                    <h2>{{ pelicula.nombre }}</h2>
                    <p><strong>Género:</strong> {{ pelicula.genero }}</p>
                    <p><strong>Duración:</strong> {{ pelicula.duracion }}</p>
                    <p><strong>Director:</strong> {{ pelicula.director }}</p>
                    <p><strong>Calificación:</strong> {{ pelicula.calificacion }}</p>
                    <p><strong>Descripción:</strong> {{ pelicula.descripcion }}</p>
                </div>
            </div>

            <!-- Reproductor de video -->
            <div class="row video-container">
                <div class="col-12">
                    <iframe :src="pelicula.video" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Sección de comentarios -->
            <div class="container mt-5">
                <h3>Comentarios</h3>
                <div class="mb-4" v-if="comentarios.length">
                    <div v-for="comentario in comentarios" :key="comentario.id" class="border rounded p-3 mb-3 bg-dark text-white">
                        <p>{{ comentario.comentario }}</p>
                        <small>{{ comentario.created_at }}</small>
                    </div>
                </div>

                <!-- Formulario para agregar un nuevo comentario -->
                <form @submit.prevent="enviarComentario">
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Deja un comentario:</label>
                        <textarea v-model="nuevoComentario" class="form-control" id="comentario" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            query: '',
            nuevoComentario: '',
            pelicula: {},
            comentarios: []
        };
    },
    created() {
        this.cargarContenido();
    },
    methods: {
        cargarContenido() {
            const id = this.$route.params.id;
            axios.get(`/api/peliculas/${id}`).then(response => {
                this.pelicula = response.data.pelicula;
                this.comentarios = response.data.comentarios;
            }).catch(error => {
                console.error("Error al cargar contenido:", error);
            });
        },
        buscar() {
            this.$router.push({ name: 'buscar', query: { query: this.query } });
        },
        enviarComentario() {
            const id = this.$route.params.id;
            axios.post(`/api/comentarios`, { comentario: this.nuevoComentario, idpelicula: id })
                .then(response => {
                    this.comentarios.push(response.data);
                    this.nuevoComentario = '';
                })
                .catch(error => {
                    console.error("Error al enviar comentario:", error);
                });
        }
    }
};
</script>

<style scoped>
body {
    background-color: #000;
    color: #fff;
}
.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
}
.content-container {
    padding: 30px;
}
.movie-poster {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 20px;
}
.movie-info h2 {
    font-size: 2.5rem;
    font-weight: bold;
}
.movie-info p {
    font-size: 1.2rem;
}
.video-container iframe {
    width: 100%;
    height: 500px;
    border-radius: 10px;
    margin-bottom: 30px;
}
</style>
