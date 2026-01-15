<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memes = Meme::with('user')
            ->latest()
            ->get();

        return view('home', ['memes' => $memes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'meme_text' => 'required|string|max:255',
            'fact' => 'required|string|max:500',
        ], [
            'meme_text.required' => 'El texto del meme es obligatorio.',
            'meme_text.max' => 'El meme debe tener menos de 255 caracteres.',
            'fact.required' => 'El dato real es obligatorio.',
            'fact.max' => 'El dato real debe tener menos de 500 caracteres.',
        ]);

        $meme = Meme::create([
            'user_id' => auth()->id(),
            'meme_text' => $validated['meme_text'],
            'fact' => $validated['fact'],
        ]);

        return redirect()->route('home');
    }
}
