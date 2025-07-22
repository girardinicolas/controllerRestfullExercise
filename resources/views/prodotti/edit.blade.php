@extends('layouts.app')

@section('content')
    <h1>Modifica prodotto</h1>
    <form method="POST" action="{{ route('prodotti.aggiorna', $prodotto->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $prodotto->nome) }}">
            @error('nome')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="prezzo">Prezzo:</label>
            <input type="number" step="0.01" name="prezzo" id="prezzo" value="{{ old('prezzo', $prodotto->prezzo) }}">
            @error('prezzo')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="descrizione">Descrizione:</label>
            <textarea name="descrizione" id="descrizione">{{ old('descrizione', $prodotto->descrizione) }}</textarea>
            @error('descrizione')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <button type="submit">Aggiorna</button>
    </form>
    <a href="{{ route('prodotti.indice') }}" style="display:inline-block;margin-top:1rem;">&larr; Torna alla lista</a>
@endsection 