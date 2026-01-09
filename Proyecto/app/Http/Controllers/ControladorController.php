<?php
namespace App\Http\Controllers;

class ControladorController extends Controller
{
    public function index()
    {
        $chirps = [
            [
                'author' => 'Jane Doe',
                'message' => 'Acabo de desplegar  '
            ],
            [
                'author' => 'Juan Pérez',
                'message' => 'Laravel '
            ],
            [
                'author' => 'Ana Gómez',
                'message' => 'Trabajando en algo con Chirper'
            ]
        ];
        $explicacion = "En el patrón MVC, el controlador recibe la petición, prepara los datos y los envía a la vista. El modelo gestiona los datos y la lógica de negocio. La vista muestra la información al usuario.";
        return view('ejemplo_mvc', ['chirps' => $chirps, 'explicacion' => $explicacion]);
    }
}   