<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AgendaADMController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgendaProfissionalController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\SetSanctumGuard;
use App\Models\Admin;
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
Route::get('Profissional/retornarTodos',[ProfissionalController::class,'retornarTodos']);
Route::post('Profissional/procurarNome',[ProfissionalController::class, 'pesquisarPorNome']);
Route::post('Profissional/pesquisarCpf',[ProfissionalController::class, 'pesquisarPorCpf']);
Route::delete('Profissional/excluir/{id}',[ProfissionalController::class, 'excluir']);
Route::put('Profissional/atualizar', [ProfissionalController::class, 'update']);




//AgendaProfissional
Route::post('AgendaProfissional/cadastro/Horario',[AgendaProfissionalController::class,'store']);


//AgendaADM                                                   
Route::post('AgendaADM/cadastro/horario',[AgendaADMController::class,'store']);

//login
Route::post('/create',[AdmController::class, 'store']);
Route::post('/login',[AdmController::class, 'login']);


Route::get('Admin/teste', [AdmController::class,'verificarUsuarioLongado'])->middleware(['auth:sanctum', SetSanctumGuard::class, IsAuthenticated::class]);





