<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status'  => 'ok',
        'message' => 'SIGSS API funcionando en Azure'
    ]);
});
