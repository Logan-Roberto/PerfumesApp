<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\PerfumeController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// CRUD'S

// Clientes
route::get('/', function(){return response()->json(['Sucesso'=>true]);});
Route::get('/cliente', [ClienteController::class, 'indexCliente']);
Route::get('/cliente/{id}', [ClienteController::class, 'showCliente']);
Route::post('/cliente', [ClienteController::class, 'storeCliente']);
Route::put('/cliente/{id}', [ClienteController::class, 'updateCliente']);
Route::delete('/cliente/{id}', [ClienteController::class, 'destroyCliente']);

// Vendas
Route::get('/venda', [VendaController::class, 'indexVenda']);
Route::get('/venda/{id}', [VendaController::class, 'showVenda']);
Route::post('/venda', [VendaController::class, "storeVenda"]);
Route::put('/venda/{id}', [VendaController::class, 'updateVenda']);
Route::delete('/venda/{id}', [VendaController::class, 'destroyVenda']);

// Perfumes
Route::get('/perfume', [PerfumeController::class, "indexPerfume"]);
Route::get('/perfume/{id}', [PerfumeController::class, "showPerfume"]);
Route::post('/perfume', [PerfumeController::class, "storePerfume"]);
Route::put('/perfume/{id}', [PerfumeController::class, "updatePerfume"]);
Route::delete('/perfume/{id}', [PerfumeController::class, "destroyPerfume"]);
