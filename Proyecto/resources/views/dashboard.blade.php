<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Bulos del 8-M') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Mis Bulos del 8-M</h1>
                        <a href="/bulos/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold transition">
                            Crear Nuevo Bulo
                        </a>
                    </div>

                    <x-bulos-feed :bulos="$bulos" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
