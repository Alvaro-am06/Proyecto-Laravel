@props(['bulos'])

<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    @forelse($bulos as $bulo)
        <div x-data="{ flipped: false }" class="relative w-full max-w-xl perspective">
            <div :class="flipped ? 'rotate-y-180' : ''"
                 class="relative w-full min-h-[34rem] h-auto"
                 @click.away="flipped = false"
                 style="transform-style: preserve-3d; transition: transform 0.6s;">

                {{-- FRONT --}}
                <div class="absolute w-full h-full backface-hidden flex flex-col bg-white shadow-lg rounded-lg p-4">

                    {{-- Avatar, nombre y acciones --}}
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            @if($bulo->user)
                                <img src="https://avatars.laravel.cloud/{{ urlencode($bulo->user->email) }}"
                                     alt="{{ $bulo->user->name }}'s avatar" class="w-12 h-12 rounded-full" />
                                <div class="flex flex-col">
                                    <span class="font-semibold">{{ $bulo->user->name }}</span>
                                    <div class="flex items-center gap-1">
                                        <span class="text-sm text-gray-500">{{ $bulo->created_at->diffForHumans() }}</span>
                                        @if ($bulo->updated_at->gt($bulo->created_at->addSeconds(5)))
                                            <span class="text-gray-500">·</span>
                                            <span class="text-sm text-gray-500 italic">editado</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                                     alt="Anonymous User" class="w-12 h-12 rounded-full" />
                                <div class="flex flex-col">
                                    <span class="font-semibold">Anonymous</span>
                                    <div class="flex items-center gap-1">
                                        <span class="text-sm text-gray-500">{{ $bulo->created_at->diffForHumans() }}</span>
                                        @if ($bulo->updated_at->gt($bulo->created_at->addSeconds(5)))
                                            <span class="text-gray-500">·</span>
                                            <span class="text-sm text-gray-500 italic">editado</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Botones de acción --}}
                        @auth
                            @if($bulo->user_id === auth()->id())
                                <div class="flex gap-1">
                                    <a href="/bulos/{{ $bulo->id }}/edit" class="text-blue-600 hover:text-blue-800 text-sm px-2 py-1">
                                        Editar
                                    </a>
                                    <form method="POST" action="/bulos/{{ $bulo->id }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar este bulo?')"
                                            class="text-red-600 hover:text-red-800 text-sm px-2 py-1">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>

                    {{-- Bulo --}}
                    <div class="flex-1 flex flex-col items-center justify-center overflow-hidden">
                        <p class="text-gray-800 text-lg text-center">{{ $bulo->texto }}</p>
                    </div>

                    {{-- Botón Flip --}}
                    <button @click.stop="flipped = true"
                            class="mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow mx-auto block">
                        Desmentir
                    </button>

                </div>

                {{-- BACK --}}
                <div class="absolute w-full h-full backface-hidden rotate-y-180 flex flex-col bg-red-50 shadow-lg rounded-lg p-4 justify-between">
                    {{-- Desmentido centrado --}}
                    <div class="flex-1 flex items-center justify-center text-center">
                        <p class="text-gray-700 text-lg">{{ $bulo->texto_desmentido }}</p>
                    </div>

                    {{-- Botón Volver abajo --}}
                    <div class="flex justify-center">
                        <button @click.stop="flipped = false"
                                class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded shadow">
                            Volver
                        </button>
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

{{-- Tailwind necesario para 3D --}}
<style>
.perspective {
    perspective: 1000px;
}
.rotate-y-180 {
    transform: rotateY(180deg);
}
.backface-hidden {
    backface-visibility: hidden;
}
</style>
