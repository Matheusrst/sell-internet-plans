<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SubPlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminRegisterController;

Auth::routes();

//rota principal
Route::get('/menu', function () {
    return view('menu');
})->middleware('auth');

//rota do menu principal
Route::get('/', function () {
    return redirect('/menu');
})->name('home.menu');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rotas autenficadas do admin
Route::middleware(['auth', 'admin'])->group(function () {
    //rota para registrar novos admin
    Route::get('/admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
    //rotas para salvar novos registros
    Route::post('/admin/register', [AdminRegisterController::class, 'register']);
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
    
    //rotas de sub-plano
    Route::prefix('plans/{plan}')->group(function () {
    //rota para cirar um sub-plano
    Route::get('subplans/create', [SubPlanController::class, 'create'])->name('subplans.create');
    //rota para visualizar os sub-planos
    Route::post('subplans', [SubPlanController::class, 'store'])->name('subplans.store');
    //rota para editar os sub-planos
    Route::get('subplans/{subplan}/edit', [SubPlanController::class, 'edit'])->name('subplans.edit');
    //rota para atualizar os sub-planos
    Route::put('subplans/{subplan}', [SubPlanController::class, 'update'])->name('subplans.update');
    //rota para deletar os sub-planos
    Route::delete('subplans/{subplan}', [SubPlanController::class, 'destroy'])->name('subplans.destroy');
    });

    //rotas de manutenção
    Route::get('/maintenances', [MaintenanceController::class, 'index'])->name('maintenances.index');
    //rotas para criar manutenção
    Route::get('/maintenances/create', [MaintenanceController::class, 'create'])->name('maintenances.create');
    //rotas para salvar manutenção
    Route::post('/maintenances', [MaintenanceController::class, 'store'])->name('maintenances.store');
    //rotas para o menu de manutenção
    Route::get('/maintenances/{maintenance}', [MaintenanceController::class, 'show'])->name('maintenances.show');
    //rotas para editar manutenções
    Route::get('/maintenances/{maintenance}/edit', [MaintenanceController::class, 'edit'])->name('maintenances.edit');
    //rotas para atualizar manutenções
    Route::put('/maintenances/{maintenance}', [MaintenanceController::class, 'update'])->name('maintenances.update');
    //rotas para deletar manutenções
    Route::delete('/maintenances/{maintenance}', [MaintenanceController::class, 'destroy'])->name('maintenances.destroy');

    // Rotas para administração de planos comprados
    Route::get('/admin/customers', [UserController::class, 'index'])->name('admin.customers.index');
    //rotas para ver de planos comprados
    Route::get('/admin/customers/{customer}/purchased-plans', [SaleController::class, 'customerPurchasedPlans'])->name('admin.customer.purchased.plans');
    //rota para editar planos comprados
    Route::get('/admin/purchased-plans/{sale}/edit', [SaleController::class, 'editPurchasedPlan'])->name('admin.edit.purchased.plan');
    //roa para salvar ediçao do plano comprado
    Route::put('/admin/purchased-plans/{sale}', [SaleController::class, 'updatePurchasedPlan'])->name('admin.update.purchased.plan');
});

Route::middleware(['auth', 'customer'])->group(function () {
    //rotas de crompras de planos
    Route::get('/plans/{plan}/sales/create', [SaleController::class, 'create'])->name('sales.create');
    //rotas de confirmação de compra
    Route::post('/plans/{plan}/sales', [SaleController::class, 'store'])->name('sales.store');
    //rotas para ver agendamentos
    Route::get('/my-maintenance', [MaintenanceController::class, 'customerMaintenances'])->name('maintenances.customer');
    // Rotas para visualizar detalhes dos sub-planos
    Route::get('/subplans/{subplan}', [SubPlanController::class, 'show'])->name('subplans.show');
    // Rota para comprar um sub-plano
    Route::get('/subplans/{subPlan}/purchase', [SaleController::class, 'createSubPlan'])->name('subplans.purchase');
    // Rota para salvar a comprar de um sub-plano
    Route::post('/subplans/{subPlan}/purchase', [SaleController::class, 'storeSubPlan'])->name('subplans.purchase.store');
    //rotas para vizualizar compras
    Route::get('/purchased-plans', [SaleController::class, 'purchasedPlans'])->name('plans.purchased');
});

/**
 * rotas gerais
 */
//rotas de planos gerais
Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
//rotas do menu de planos gerais
Route::get('/plans/{plan}', [PlanController::class, 'show'])->name('plans.show');
//rota para deletar um plano comprado
Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy')->middleware('auth');