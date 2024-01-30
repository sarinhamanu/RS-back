<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgendaProfissionalController;
use App\Http\Controllers\ProfissionalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Profisiional


Route::post('Profissional/cadastro/Cliente',[ProfissionalController::class,'store']);


//AgendaProfissional

Route::post('AgendaProfissional/cadastro/Horario',[AgendaProfissionalController::class,'store']);



