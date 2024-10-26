<script>
import axios from 'axios';

export default {
    name: 'MangaTable',
    data() {
        return {
            mangas: [], // Array para almacenar los datos de los mangas
        };
    },
    mounted() {
        this.fetchMangas();
    },
    methods: {
        async fetchMangas() {
            const token = '9|ZfAB7NWwadVUXBfJfHwVWGWNLF9n6URlU3BWheRT';
            try {
                const response = await axios.get('https://www.nekoshopgt.store/api/ultimos-mangas', {
                    headers: {
                       Authorization: `Bearer ${token}`
                    }
                });
                this.mangas = response.data;
            } catch (error) {
                console.error('Error al obtener datos de la API:', error);
            }
        }
    }
};
</script>

<template>
    <div class="container-sm">
        <h2 class="text-center mt-4" style="           background: linear-gradient(to bottom right, #000, #434343); /* Cambia los colores a tu preferencia */
            color: #fff;">Listado de Mangas, ingresa a Neko en el navbar si deseas acceder a neko shop y adquirir tus mangas con descuentos del 1.%</h2>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tomo</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Género</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="manga in mangas" :key="manga.id">
                <td>{{ manga.id }}</td>
                <td>{{ manga.nombre_manga }}</td>
                <td>{{ manga.tomo }}</td>
                <td>Q{{ manga.precio }}</td>
                <td><img :src="manga.image" :alt="manga.nombre_manga" style="width: 50px; height: auto;"></td>
                <td>{{ manga.genero }}</td>

            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.text-center {
    text-align: center;
}
.table {
    width: 100%;
    margin: auto;
}
</style>