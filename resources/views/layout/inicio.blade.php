<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" async defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div id="app">
    <!-- Aquí es donde vue-router renderizará los componentes según la ruta -->
    <router-view></router-view>   
</div>

</body>
</html>
