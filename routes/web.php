<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\VisitaTecnicaController;
use App\Http\Controllers\CategoriasController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomePageController::class,"index"])->name('index');
//Route::get('/dash', [DashboardController::class,"dash"])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/dashboard', [DashboardController::class,"index"])->name('dashboard');

Route::get('/vendas', [VendaController::class, 'vendas'])->name('venda.mostrar');
//Route::get('/vendas/{id}/editar', [VendaController::class, 'editarVenda'])->name('venda.editar');
//Route::put('/vendas/{id}', [VendaController::class, 'atualizarVenda'])->name('venda.atualizar');
Route::delete('/vendas/{id}', [VendaController::class, 'deletarVenda'])->name('venda.deletar');
Route::get('/total-vendas', [VendaController::class, 'obterTotal']);


Route::get('/despesas/{despesa}', [DespesasController::class, 'edit'])->name('despesas.edit');
Route::get('/despesas/create', [DespesasController::class, 'create'])->name('despesas.create');
Route::get('/despesas', [DespesasController::class, 'index'])->name('despesas.index');
Route::delete('/despesas/{id}', [DespesasController::class, 'destroy'])->name('despesas.destroy');
Route::put('/despesas/{id}', [DespesasController::class, 'update'])->name('despesas.update');
Route::post('/despesas', [DespesasController::class, 'store'])->name('despesas.store');


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

Route::middleware(['admin.access'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('gerenciar.funcionario');
    Route::put('/admin/users/{userId}/update-level', [AdminUserController::class, 'updateLevel'])->name('gerenciar.funcionario.updateLevel');
    Route::get('/admin/users/searchByCPF', [AdminUserController::class, 'searchByCPF'])->name('gerenciar.funcionario.searchByCPF');
});


// Route::get('/visitas', [VisitaTecnicaController::class, 'index'])->name('visitas');
// Route::get('/visitas/create', [VisitaTecnicaController::class, 'create'])->name('visitas.create');
// Route::post('/visitas', [VisitaTecnicaController::class, 'store'])->name('visitas.store');
// Route::get('/usuarios-com-visitas', [VisitaTecnicaController::class, 'usuariosComVisitasTecnicas'])->name('visitas.usuarios-com-visitas');

Route::get('/gerenciar-visitas/create', [VisitaTecnicaController::class, 'create'])->name('visitas.create');
Route::post('/gerenciar-visitas', [VisitaTecnicaController::class, 'store'])->name('visitas.store');
Route::get('/usuarios-com-visitas', [VisitaTecnicaController::class, 'usuariosComVisitasTecnicas'])->name('index');




require __DIR__.'/auth.php';
