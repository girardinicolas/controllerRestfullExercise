<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    // Nome tabella (opzionale, se non è 'prodottos')
    protected $table = 'prodotti';

    protected $fillable = [
        'nome',
        'prezzo',
        'descrizione',
    ];
}
