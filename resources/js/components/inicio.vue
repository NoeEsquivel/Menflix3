<script setup>
// No necesitas agregar mucha lógica aquí ya que todo es estático, pero si en el futuro deseas cargar dinámicamente los videos o las películas, este es el lugar para hacerlo.
</script>

<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Menflix</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Series</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="#">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" required>
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Carrusel de Videos -->
        <div id="videoCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video class="d-block w-100" controls autoplay loop>
                        <source src="/video/john.mp4" type="video/mp4">
                        Tu navegador no soporta el video HTML5.
                    </video>
                    <div class="carousel-caption d-none d-md-block">
                        <h2>John Wick Otro día para Matar</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <video class="d-block w-100" controls autoplay loop>
                        <source src="/video/JOHN WICK 2.mp4" type="video/mp4">
                        Tu navegador no soporta el video HTML5.
                    </video>
                    <div class="carousel-caption d-none d-md-block">
                        <h2>John Wick 2 Un Nuevo Día Para Matar</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <video class="d-block w-100" controls autoplay loop>
                        <source src="/video/JOHN WICK 3.mp4" type="video/mp4">
                        Tu navegador no soporta el video HTML5.
                    </video>
                    <div class="carousel-caption d-none d-md-block">
                        <h2>John Wick 3 Parabellum</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <video class="d-block w-100" controls autoplay loop>
                        <source src="/video/JOHN WICK 4.mp4" type="video/mp4">
                        Tu navegador no soporta el video HTML5.
                    </video>
                    <div class="carousel-caption d-none d-md-block">
                        <h2>John Wick 4</h2>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <!-- Contenido -->
        <div class="container">
            <h2 class="content-title">Todas las Películas y Series</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
                <div class="col">
                    <div class="movie-card">
                        <a href="#">
                            <img src="/portada/john.webp" alt="Película 1">
                            <h5 class="text-center">John Wick 1</h5>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="movie-card">
                        <a href="#">
                            <img src="/portada/john2.jpg" alt="Película 2">
                            <h5 class="text-center">John Wick 2</h5>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="movie-card">
                        <a href="#">
                            <img src="/portada/john3.webp" alt="Película 3">
                            <h5 class="text-center">John Wick 3</h5>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="movie-card">
                        <a href="#">
                            <img src="/portada/john4.jpg" alt="Película 4">
                            <h5 class="text-center">John Wick 4</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    body {
        background-color: #000;
        color: #fff;
    }
    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }
    .carousel-item video {
        height: 500px;
        object-fit: cover;
        width: 100%;
    }
    .content-title {
        margin-top: 30px;
        font-size: 1.75rem;
    }
    .movie-card {
        background-color: #333;
        border-radius: 5px;
        overflow: hidden;
    }
    .movie-card img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }
    .movie-card h5 {
        padding: 15px;
        font-size: 1.25rem;
    }
</style>
