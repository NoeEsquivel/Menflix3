<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menflix - Reportes</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
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
                <form class="d-flex" action="{{ route('contenido.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif

    <!-- Elemento raíz #app que contiene todo -->
    <div id="app" class="row">>
        <!-- CRUD de reportes -->
        
            <div class="col-xs-12">
                <h2 class="page-header">Lista de reportes</h2>
            </div>
            <div class="col-sm-7">
                <a href="#" class="btn btn-primary pull-right">Nuevo Reporte</a>
                <table class="table table-hover table-sprite">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelicula</th>
                            <th>Tipo de Problema</th>
                            <th>Minuto del Problema</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="keep in keeps">
                            <td width="10px">@{{ keep.idpelicula }}</td>
                            <td>@{{ keep.nombre_pelicula }}</td>
                            <td>@{{ keep.tipo_de_problema }}</td>
                            <td>@{{ keep.minuto_del_problema }}</td>
                            <td width="10px">
                                <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
        <div>
        <!-- Formulario de reportes e información adicional -->
        <reporte></reporte>
        <br><br>
        <info></info>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script> <!-- Asegúrate de tener esta línea -->
</body>
</html>
