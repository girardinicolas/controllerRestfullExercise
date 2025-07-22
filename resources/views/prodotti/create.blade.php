@extends('layouts.app')

@section('content')
    <h1>Crea nuovo prodotto</h1>
    <form method="POST" action="{{ route('prodotti.salva') }}">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}">
            @error('nome')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="prezzo">Prezzo:</label>
            <input type="number" step="0.01" name="prezzo" id="prezzo" value="{{ old('prezzo') }}">
            @error('prezzo')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="descrizione">Descrizione:</label>
            <textarea name="descrizione" id="descrizione">{{ old('descrizione') }}</textarea>
            @error('descrizione')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <button type="submit">Salva</button>
    </form>
@endsection 