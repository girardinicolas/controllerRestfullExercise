@extends('layouts.app')

@section('content')
    <h1>Lista Prodotti</h1>
    <a href="{{ route('prodotti.crea') }}" style="display:inline-block;margin-bottom:1rem;">+ Nuovo prodotto</a>
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%;border-collapse:collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Descrizione</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse($prodotti as $prodotto)
                <tr>
                    <td>{{ $prodotto['id'] }}</td>
                    <td>{{ $prodotto['nome'] }}</td>
                    <td>€ {{ number_format($prodotto['prezzo'], 2, ',', '.') }}</td>
                    <td>{{ $prodotto['descrizione'] }}</td>
                    <td>
                        <a href="{{ route('prodotti.visualizza', $prodotto['id']) }}">Visualizza</a> |
                        <a href="{{ route('prodotti.modifica', $prodotto['id']) }}">Modifica</a> |
                        <form action="{{ route('prodotti.elimina', $prodotto['id']) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo prodotto?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nessun prodotto disponibile.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 