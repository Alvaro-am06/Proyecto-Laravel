@props(['bulos'])

<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    @forelse($bulos as $bulo)
        <div class="flip-card flex justify-center">
            <div class="flip-card-inner max-w-xs w-full">
                <!-- Cara frontal - Bulo -->
                <div class="flip-card-front bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <p class="text-gray-800 text-lg mb-4">{{ $bulo->texto_bulo }}</p>
                            <p class="text-sm text-gray-500 mb-2">Por: {{ $bulo->user->name }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button class="flip-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold transition flex-1">Verdad</button>
                            @auth
                                @if($bulo->user_id === auth()->id())
                                    <a href="/bulos/{{ $bulo->id }}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold transition">Editar</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Cara trasera - Desmentido -->
                <div class="flip-card-back bg-red-50 rounded-lg shadow-lg border border-red-300 p-6">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <p class="text-gray-800 text-lg mb-4">{{ $bulo->texto_desmentido }}</p>
                            <p class="text-sm text-gray-500 mb-2">Por: {{ $bulo->user->name }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button class="flip-btn bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition flex-1">Bulo</button>
                            @auth
                                @if($bulo->user_id === auth()->id())
                                    <form method="POST" action="/bulos/{{ $bulo->id }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm transition border border-red-700" onclick="return confirm('¿Estás seguro de eliminar este bulo?')">Eliminar</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500 text-lg">No hay bulos registrados aún.</p>
            @auth
                <a href="/bulos/create" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition inline-block mt-4">Crear el primer bulo</a>
            @endauth
        </div>
    @endforelse
</div>
