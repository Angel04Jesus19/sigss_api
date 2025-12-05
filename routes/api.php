<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DependenciaController;

Route::get('/dependencias', [DependenciaController::class, 'index']);
Route::get('/dependencias/{id}', [DependenciaController::class, 'show']);
