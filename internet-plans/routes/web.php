<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SaleController;

Auth::routes();

//rota principal
Route::get('/menu', function () {
    return view('menu');
})->middleware('auth');

//rotas autenficadas do admin
Route::middleware(['auth', 'admin'])->group(function () {
    //rotas do plano
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    //rotas de criação de plano
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    //rotas do menu de planos
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    //rotas das configurações do plano
    Route::get('/plans/{plan}', [PlanController::class, 'show'])->name('plans.show');
    //rotas de edição do plano
    Route::get('/plans/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    //rotas de update de plano
    Route::put('/plans/{plan}', [PlanController::class, 'update'])->name('plans.update');
    //rotas de exclusão de plano
    Route::delete('/plans/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');
});

//rotas de planos gerais
Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
//rotas do menu de planos gerais
Route::get('/plans/{plan}', [PlanController::class, 'show'])->name('plans.show');

Route::middleware(['auth', 'customer'])->group(function () {
    //rotas de crompras de planos
    Route::get('/plans/{plan}/sell', [SaleController::class, 'create'])->name('sales.create');
    //rotas de confirmação de compra
    Route::post('/plans/{plan}/sell', [SaleController::class, 'store'])->name('sales.store');
});


//rota do menu principal
Route::get('/', function () {
    return redirect('/menu');
})->name('home.menu');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
