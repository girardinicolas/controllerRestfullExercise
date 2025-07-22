<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdottoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('prodotti', ProdottoController::class)->names([
    'index' => 'prodotti.indice',
    'create' => 'prodotti.crea',
    'store' => 'prodotti.salva',
    'show' => 'prodotti.visualizza',
    'edit' => 'prodotti.modifica',
    'update' => 'prodotti.aggiorna',
    'destroy' => 'prodotti.elimina',
]);
