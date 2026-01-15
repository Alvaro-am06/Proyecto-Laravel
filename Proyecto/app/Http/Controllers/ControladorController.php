<?php
namespace App\Http\Controllers;

use App\Models\Bulo;

class ControladorController extends Controller
{
    public function index()
    {
        $memes = \App\Models\Meme::all();
        return view('meme', ['memes' => $memes]);
    }
}   