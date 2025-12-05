<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/test-db', function () {
    try {
        $result = DB::select('SELECT TOP 1 * FROM Dependencias'); // ajusta el nombre de la tabla si hace falta
        return response()->json([
            'ok' => true,
            'data' => $result,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'ok' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
});
