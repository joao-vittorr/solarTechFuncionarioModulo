<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\PDFController;


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

Route::post('/receber-dados', [VendaController::class, 'ReceberDados']);
Route::get('/compras-cliente/{id}', [VendaController::class, 'comprasCliente']);
Route::get('/cliente/faturas/{id}', [VendaController::class, 'faturaPorId']);
Route::delete('/compras-cliente/{id}', [VendaController::class, 'deletarVenda']);
Route::get('/pdf/{id}', [PDFController::class, 'gerarPDFapi']);

Route::get('/despesasTest', [DespesasController::class, 'indextest'])->name('test.index');
