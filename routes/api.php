<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DependenciaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Se accede a ellas con el prefijo /api
*/

Route::get('/dependencias', [DependenciaController::class, 'index']);
Route::get('/dependencias/{id}', [DependenciaController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
