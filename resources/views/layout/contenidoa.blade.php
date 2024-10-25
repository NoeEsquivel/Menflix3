{{-- resources/views/contenidoa.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anime->nombre }} - Menflix</title>
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
        .comment-section {
            margin-top: 40px;
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
                    <li class="nav-item">
                    <a class="nav-link active" href="https://www.facebook.com/Nekotaku.ShopGT/?locale=es_LA">Neko</a>
                </li>
                </ul>
                <form class="d-flex" action="{{ route('contenidoa.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container content-container">
        <div class="row">
            <!-- Columna de la portada -->
            <div class="col-md-4">
                <img src="{{ $anime->portada }}" alt="{{ $anime->nombre }}" class="movie-poster">
            </div>
            <!-- Columna de la información -->
            <div class="col-md-8 movie-info">
                <h2>{{ $anime->nombre }}</h2>
                <p><strong>Géneros:</strong> {{ $anime->generos }}</p>
                <p><strong>Capítulos:</strong> {{ $anime->capitulos }}</p>
                <p><strong>Temporada:</strong> {{ $anime->Temporada }}</p>
                <p><strong>Calificación:</strong> {{ $anime->calificacion }}</p>
                <p><strong>Descripción:</strong> {{ $anime->descripcion }}</p>
            </div>
        </div>

        <!-- Reproductor de video -->
        <div class="row video-container">
            <div class="col-12">
                <iframe src="{{ $anime->video }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Botones para reportar problemas -->
        <div class="mb-4 text-center">
            <button class="btn" style="background-color: orange; color: white;">
                Reportar un problema desde aquí
            </button>
            <!-- Botón para redirigir a la vista de quejas -->
            <button class="btn" style="background-color: yellow; color: black;">
                <a href="{{ route('quejas', ['idanime' => $anime->id, 'nombre_anime' => $anime->nombre]) }}" target="_blank" style="text-decoration: none; color: black;">
                    Reportar un problema desde una nueva ventana
                </a>
            </button>
        </div>

        <!-- Vue app div -->
        <div id="app">
            <!-- Componente Actor -->
            <actor 
                :protagonista="'{{ $anime->protagonista }}'" 
                :foto="'{{ $anime->foto }}'"
                :biografia="'{{ $anime->secundarios }}'">
            </actor>

            <!-- Componente Relacionados -->
            <relacionados :nombre-anime="'{{ $anime->nombre }}'"></relacionados>

            <!-- Sección de comentarios -->
            <div class="container mt-5">
                <h3>Comentarios</h3>

                <!-- Mostrar comentarios existentes -->
                <div class="mb-4">
                    @foreach ($comentarios as $comentario)
                        <div class="border rounded p-3 mb-3 bg-dark text-white">
                            <p>{{ $comentario->comentario }}</p>
                            <small>{{ $comentario->created_at }}</small>
                        </div>
                    @endforeach
                </div>

                <!-- Formulario para agregar nuevo comentario -->
                <form action="{{ route('comentariosa.store', ['idanime' => $anime->idanimes]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Deja un comentario:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            
            <!-- Componente Info -->
            <info></info>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
