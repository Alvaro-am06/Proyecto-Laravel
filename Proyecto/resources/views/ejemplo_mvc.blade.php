<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejemplo MVC</title>
    <!-- Estilos eliminados -->
</head>
<body>
    <div>
        <h1>Ejemplo MVC en Laravel</h1>
        <div>
            {{ $explicacion }}
        </div>
        <h2>Chirps de ejemplo</h2>
        @foreach ($chirps as $chirp)
            <div>
                <div>{{ $chirp['author'] }}</div>
                <div>{{ $chirp['message'] }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>
