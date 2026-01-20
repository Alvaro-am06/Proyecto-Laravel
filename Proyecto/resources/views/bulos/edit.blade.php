<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Editar Bulo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-xl p-6">
                <form method="POST" action="/bulos/{{ $bulo->id }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="texto_bulo" class="block text-gray-700 font-semibold mb-2">
                            Texto del Bulo
                        </label>
                        <textarea 
                            name="texto_bulo" 
                            id="texto_bulo" 
                            rows="4" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent @error('texto_bulo') border-red-500 @enderror" 
                            required>{{ old('texto_bulo', $bulo->texto_bulo) }}</textarea>
                        @error('texto_bulo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="texto_desmentido" class="block text-gray-700 font-semibold mb-2">
                            Texto del Desmentido
                        </label>
                        <textarea 
                            name="texto_desmentido" 
                            id="texto_desmentido" 
                            rows="4" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent @error('texto_desmentido') border-red-500 @enderror" 
                            required>{{ old('texto_desmentido', $bulo->texto_desmentido) }}</textarea>
                        @error('texto_desmentido')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="/" class="text-purple-600 hover:text-purple-800">← Volver</a>
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg font-semibold transition">Actualizar Bulo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>