<x-layout>
    <x-slot:title>
        Memes del 8-M
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="flex flex-col items-center justify-center mt-8 mb-6">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="8" r="6" stroke="#a020f0" stroke-width="2" fill="none"/>
                <line x1="12" y1="14" x2="12" y2="22" stroke="#a020f0" stroke-width="2"/>
                <line x1="9" y1="19" x2="15" y2="19" stroke="#a020f0" stroke-width="2"/>
            </svg>
            <h1 class="text-3xl font-bold text-center mt-2" style="color:#a020f0">Día Internacional de la Mujer</h1>
            <p class="text-center text-purple-700 font-semibold">8 de marzo</p>
        </div>

        <div class="space-y-4 mt-8">
            @forelse ($memes as $meme)
                <div class="card bg-base-100">
                    <div class="card-body flex flex-col items-center">
                        <img src="{{ $meme->url ?? '' }}" alt="{{ $meme->titulo ?? $meme->meme_text }}" class="rounded-lg shadow mb-2 max-w-xs max-h-60">
                        <div class="font-semibold text-purple-800 text-lg text-center">{{ $meme->titulo ?? $meme->meme_text }}</div>
                        <div class="text-gray-600 text-center mt-2">{{ $meme->fact ?? '' }}</div>
                    </div>
                </div>
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="mt-4 text-base-content/60">No hay memes todavía. ¡Sé el primero en añadir uno!</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
