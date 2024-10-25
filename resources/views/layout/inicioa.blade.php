<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menflix - Animes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-image: url('/fondos/saku2.jpg');
            background-size: cover; /* Asegura que la imagen cubra toda el área */
            background-position: center; /* Centra la imagen */
            color: #fff; /* Mantiene el color del texto en blanco */
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
    
        .content-title {
            margin-top: 30px;
            font-size: 1.75rem;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo negro semi-transparente */
            padding: 10px; /* Espacio alrededor del texto */
            border-radius: 5px; /* Bordes redondeados */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Contorno oscuro */
        }
        .anime-card {
            background-color: #333;
            border-radius: 5px;
            overflow: hidden;
        }
        .anime-card img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }
        .anime-card h5 {
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
                    <a class="nav-link" href="{{ url('/inicio') }}">Películas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/anime">Animes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.facebook.com/Nekotaku.ShopGT/?locale=es_LA">Neko</a>
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

<!-- Contenido de Animes -->
<div class="container">
    <h2 class="content-title">Todos los Animes Disponibles En Colaboracion Con NekoShop</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
        @foreach($animes as $anime)
        <div class="col">
            <div class="anime-card">
                <a href="{{ route('contenidoa.show', ['id' => $anime->idanimes]) }}">
                    <img src="{{ $anime->portada }}">
                    <h5 class="text-center">{{ $anime->nombre }}</h5>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Componente Info -->
<div id="app">
    <br><br>
    <info></info>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script> <!-- Asegúrate de tener esta línea -->
</body>
</html>
