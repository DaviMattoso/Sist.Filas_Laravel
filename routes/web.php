<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    DB::select('select 1');

    return 'Conexão com o banco de dados!';
})->name('home');
