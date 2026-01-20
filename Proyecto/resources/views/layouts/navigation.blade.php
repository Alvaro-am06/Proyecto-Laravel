<nav class="bg-purple-600 shadow-lg py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex-1"></div>
        <div class="flex-1 flex justify-center">
            <a href="/" class="text-3xl font-bold text-white">8-M</a>
        </div>
        <div class="flex-1 flex justify-end gap-2">
            @auth
                <span class="mr-3 text-white font-medium self-center">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold transition">Cerrar Sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold transition">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold transition">Registrar</a>
            @endauth
        </div>
    </div>
</nav>
