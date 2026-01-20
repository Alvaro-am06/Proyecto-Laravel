<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8-M Bulos</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-purple-600 shadow-lg mb-6 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex-1"></div>
            <div class="flex-1 flex justify-center">
                <span class="text-3xl font-bold text-white">8-M</span>
            </div>
            <div class="flex-1 flex justify-end gap-2">
                @auth
                    <span class="mr-3 text-white font-medium self-center">{{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold transition">Cerrar Sesión</button>
                    </form>
                @else
                    <a href="/login" class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold transition">Iniciar Sesión</a>
                    <a href="/register" class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold transition">Registrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ session('error') }}</div>
        @endif
        
        <div class="mb-8">
            @auth
                <a href="/bulos/create" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition inline-block">+ Crear Bulo</a>
            @endauth
        </div>

        <x-bulos-feed :bulos="$bulos" />
    </div>

    <style>
        .flip-card {
            perspective: 1000px;
            min-height: 250px;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            min-height: 250px;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            min-height: 250px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.flip-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.flip-card').classList.toggle('flipped');
                });
            });
        });
    </script>
</body>
</html>
