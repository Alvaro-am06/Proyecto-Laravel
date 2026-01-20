<?php
namespace App\Http\Controllers;

use App\Models\Bulo;

class ControladorController extends Controller
{
    public function index()
    {
        $bulos = Bulo::with('user')->get();
        return view('welcome', ['bulos' => $bulos]);
    }
}   