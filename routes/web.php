<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin.access'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('gerenciar.funcionario');
    Route::put('/admin/users/{userId}/update-level', [AdminUserController::class, 'updateLevel'])->name('gerenciar.funcionario.updateLevel');
    Route::get('/admin/users/searchByCPF', [AdminUserController::class, 'searchByCPF'])->name('gerenciar.funcionario.searchByCPF');

    Route::get('/dashboard', [DashboardController::class,"index"])->name('dashboard');
    
    Route::get('/vendas', [VendaController::class, 'vendas'])->name('venda.mostrar');
    Route::delete('/vendas/{id}', [VendaController::class, 'deletarVendaCliente'])->name('venda.deletar.cliente');
    
    Route::get('/fatura/pdf/{id}/create', [PDFController::class, 'generatePDF'])->name('gerarPDF');
    Route::get('/fatura/pdf/{id}', [PDFController::class, 'index'])->name('pdf.index');
    Route::get('/pdf/{id}', [PDFController::class, 'gerarPDFapi'])->name('PDFapi');
    
    Route::get('/despesas/{despesa}', [DespesasController::class, 'edit'])->name('despesas.edit');
    Route::get('/despesas/create', [DespesasController::class, 'create'])->name('despesas.create');
    Route::get('/despesas', [DespesasController::class, 'index'])->name('despesas.index');
    Route::put('/despesas/{id}', [DespesasController::class, 'update'])->name('despesas.update');
    Route::post('/despesas', [DespesasController::class, 'store'])->name('despesas.store');
    Route::delete('/despesas/{id}', [DespesasController::class, 'destroy'])->name('despesas.destroy');
        
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::get('/categorias/{categoria}', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    
    Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');
    Route::get('/estoque/{produto}', [EstoqueController::class, 'edit'])->name('estoque.edit');
    Route::get('/estoque/create', [EstoqueController::class, 'create'])->name('estoque.create');
    Route::delete('/estoque/{id}', [EstoqueController::class, 'destroy'])->name('estoque.destroy');
    Route::put('/estoque/{id}', [EstoqueController::class, 'update'])->name('estoque.update');
    Route::post('/estoque', [EstoqueController::class, 'store'])->name('estoque.store');  
    
    Route::get('/faturas-visualizar', [FaturaController::class, 'indexView'])->name('fatura.index');
    Route::get('/faturas', [FaturaController::class, 'index']);
    Route::get('/faturas/{id}', [FaturaController::class, 'show']);
    Route::put('/faturas/{id}', [FaturaController::class, 'update']);
    Route::put('/faturas/{id}/atualizar-pagamento', [FaturaController::class, 'atualizarPagamento'])->name('atualizar-pagamento');
    Route::get('/cliente/faturas', [VendaController::class, 'faturasCliente']);
    Route::get('/faturas/pesquisar', [FaturaController::class, 'pesquisarFatura'])->name('fatura.pesquisar');
});





require __DIR__.'/auth.php';
