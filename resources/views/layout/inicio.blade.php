<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menflix - Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background: linear-gradient(to bottom right, #000, #434343); /* Cambia los colores a tu preferencia */
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .carousel-item video {
        height: 500px; /* Ajusta la altura del video */
        object-fit: cover; /* Ajusta cómo se adapta el video al contenedor */
        width: 100%; /* Asegura que el video ocupe todo el ancho del carrusel */
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
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/inicio') }}">Menflix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/anime">Animes</a>
                    </li>
                </ul>
                <form class="d-flex me-3" action="{{ route('contenido.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>
    @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif

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
                <source src="{{ asset('video/john.mp4') }}" type="video/mp4">
                Tu navegador no soporta el video HTML5.
            </video>
            <div class="carousel-caption d-none d-md-block">
                <h2>John Wick Otro dia para Matar</h2>
            </div>
        </div>
        <div class="carousel-item">
            <video class="d-block w-100" controls autoplay loop>
                <source src="{{ asset('video/JOHN WICK 2.mp4') }}" type="video/mp4">
                Tu navegador no soporta el video HTML5, intenta con otro navegador.
            </video>
            <div class="carousel-caption d-none d-md-block">
                <h2>John Wick 2 Un Nuevo Dia Para Matar</h2>
            </div>
        </div>
        <div class="carousel-item">
            <video class="d-block w-100" controls autoplay loop>
                <source src="{{ asset('video/JOHN WICK 3.mp4') }}" type="video/mp4">
                Tu navegador no soporta el video HTML5.
            </video>
            <div class="carousel-caption d-none d-md-block">
                <h2>John Wick 3 Parabellum</h2>
            </div>
        </div>
        <div class="carousel-item">
            <video class="d-block w-100" controls autoplay loop>
                <source src="{{ asset('video/JOHN WICK 4.mp4') }}" type="video/mp4">
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

<!-- JavaScript para manejar el carrusel -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carouselElement = document.getElementById('videoCarousel');
        var carousel = new bootstrap.Carousel(carouselElement);

        carouselElement.addEventListener('slid.bs.carousel', function () {
            var videos = carouselElement.querySelectorAll('video');
            videos.forEach(function(video) {
                video.pause(); // Pausa todos los videos
            });

            var activeVideo = carouselElement.querySelector('.carousel-item.active video');
            if (activeVideo) {
                activeVideo.play(); // Reproduce el video activo
            }
        });
    });
</script>


    <!-- Contenido -->
<div class="container">
    <h2 class="content-title">Todas las Películas y Series</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
        <div class="col">
            <div class="movie-card">
                <!-- Envolvemos la imagen y el título en un enlace -->
                <a href="{{ route('contenido.show', ['id' => 2]) }}">
                    <img src="/portada/john.webp" alt="Película 1">
                    <h5 class="text-center">John Wick 1</h5>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="movie-card">
                <a href="{{ route('contenido.show', ['id' => 3]) }}">
                    <img src="/portada/john2.jpg" alt="Serie 2">
                    <h5 class="text-center">John Wick 2</h5>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="movie-card">
                <a href="{{ route('contenido.show', ['id' => 5]) }}">
                    <img src="/portada/john3.webp" alt="Película 3">
                    <h5 class="text-center">John Wick 3</h5>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="movie-card">
                <a href="{{ route('contenido.show', ['id' => 6]) }}">
                    <img src="/portada/john4.jpg" alt="Serie 4">
                    <h5 class="text-center">John Wick 4</h5>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="movie-card">
                <a href="{{ route('contenido.show', ['id' => 7]) }}">
                    <img src="/portada/dwho1.jpg" alt="Película 3">
                    <h5 class="text-center">Docto Who</h5>
                </a>
            </div>
        </div>
        <!-- Repite los elementos según sea necesario -->
    </div>
</div>
<div id="app">
    <br><br>
    <info></info>
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script> <!-- Asegúrate de tener esta línea -->
</body>
</html>
