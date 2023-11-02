<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\VendaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AdminUserController;

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


Route::get('/vendas', [VendaController::class, 'vendas'])->name('venda.mostrar');
//Route::get('/vendas/{id}/editar', [VendaController::class, 'editarVenda'])->name('venda.editar');
//Route::put('/vendas/{id}', [VendaController::class, 'atualizarVenda'])->name('venda.atualizar');
Route::delete('/vendas/{id}', [VendaController::class, 'deletarVenda'])->name('venda.deletar');

Route::get('/total-vendas', [VendaController::class, 'obterTotal']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');;


Route::middleware(['admin.access'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('gerenciar.funcionario');
    Route::put('/admin/users/{userId}/update-level', [AdminUserController::class, 'updateLevel'])->name('gerenciar.funcionario.updateLevel');
    Route::get('/admin/users/searchByCPF', [AdminUserController::class, 'searchByCPF'])->name('gerenciar.funcionario.searchByCPF');
});




require __DIR__.'/auth.php';
