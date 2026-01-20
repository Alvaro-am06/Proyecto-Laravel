<?php

namespace App\Http\Controllers;

use App\Models\Bulo;
use Illuminate\Http\Request;

class BuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'texto_bulo' => 'required|string|max:255',
            'texto_desmentido' => 'required|string|max:255',
        ]);

        Bulo::create([
            'texto_bulo' => $request->texto_bulo,
            'texto_desmentido' => $request->texto_desmentido,
            'user_id' => auth()->id(),
        ]);

        return redirect('/')->with('success', 'Bulo creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bulo = Bulo::findOrFail($id);

        if ($bulo->user_id !== auth()->id()) {
            abort(403);
        }

        return view('bulos.edit', compact('bulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bulo = Bulo::findOrFail($id);

        if ($bulo->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'texto_bulo' => 'required|string|max:255',
            'texto_desmentido' => 'required|string|max:255',
        ]);

        $bulo->update([
            'texto_bulo' => $request->texto_bulo,
            'texto_desmentido' => $request->texto_desmentido,
        ]);

        return redirect('/')->with('success', 'Bulo actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bulo = Bulo::findOrFail($id);
        if ($bulo->user_id !== auth()->id()) {
            abort(403);
        }
        $bulo->delete();
        return redirect('/')->with('success', 'Bulo borrado correctamente.');
    }
}
