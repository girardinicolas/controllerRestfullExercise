<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProdottoRequest;
use App\Models\Prodotto;

class ProdottoController extends Controller
{
    public function index()
    {
        $prodotti = Prodotto::all();
        return view('prodotti.index', compact('prodotti'));
    }

    public function create()
    {
        // Mostra il form per creare un nuovo prodotto
        return view('prodotti.create');
    }

    public function store(StoreProdottoRequest $request)
    {
        $validated = $request->validated();
        // Genera id random unico a 4 cifre
        do {
            $id = random_int(1000, 9999);
        } while (Prodotto::where('id', $id)->exists());
        $validated['id'] = $id;
        $prodotto = Prodotto::create($validated);
        return redirect()->route('prodotti.indice')->with('success', 'Prodotto creato con successo!');
    }

    public function show($id)
    {
        // Mostra un singolo prodotto
        return response("Dettaglio prodotto {$id} (show)", 200);
    }

    public function edit($id)
    {
        $prodotto = Prodotto::findOrFail($id);
        return view('prodotti.edit', compact('prodotto'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0.01',
        ]);
        $prodotto = Prodotto::findOrFail($id);
        $prodotto->update($validated);
        return redirect()->route('prodotti.indice')->with('success', 'Prodotto aggiornato con successo!');
    }

    public function destroy($id)
    {
        $prodotto = Prodotto::findOrFail($id);
        $prodotto->delete();
        return redirect()->route('prodotti.indice')->with('success', 'Prodotto eliminato con successo!');
    }
}
