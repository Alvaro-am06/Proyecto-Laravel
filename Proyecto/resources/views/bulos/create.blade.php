<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Registrar Bulo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-xl p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                <form method="POST" action="/bulos">
                    @csrf
                    <div class="mb-6">
                        <label for="texto" class="block text-gray-700 font-semibold mb-2">
                            Texto del Bulo
                        </label>
                        <textarea
                            name="texto"
                            id="texto"
                            rows="4"
                            class="w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent {{ $errors->has('texto') ? 'border border-red-500' : 'border border-gray-300' }}"
                            required>{{ old('texto') }}</textarea>
                        @error('texto')
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
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent {{ $errors->has('texto_desmentido') ? 'border-red-500' : '' }}"
                            required>{{ old('texto_desmentido') }}</textarea>
                        @error('texto_desmentido')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="/" class="text-purple-600 hover:text-purple-800">← Volver</a>
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg font-semibold transition">Registrar Bulo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>