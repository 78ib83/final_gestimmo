<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContratsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaintenancesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
Route::get('/gestweb', function () {
    return Inertia::render('Gest_Web',[DashboardController::class, 'propList']);
})->name('gestweb');
*/
Route::get('/gestweb', [DashboardController::class, 'propList'])->name('gestweb');

/*
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
/*
Route::get('/dashboard',[
    DashboardController::class, 'propCount'
])->middleware(['auth', 'verified'])->name('dashboard.propCount');
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'propCount'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Properties
    Route::get('/properties', [PropertiesController::class, 'index'])->name('properties');
    Route::post('/properties', [PropertiesController::class, "store"])->name("properties.store");
    Route::get('/properties/create', [PropertiesController::class, 'create'])->name('properties.create');
    Route::get('/properties/{property}/edit', [PropertiesController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertiesController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertiesController::class, 'destroy'])->name('properties.destroy');


    //Clients
    Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
    Route::post('/clients', [ClientsController::class, "store"])->name("clients.store");
    Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

    //Maintenances
    Route::get('/maintenances', [MaintenancesController::class, 'index'])->name('maintenances');
    Route::post('/maintenances', [MaintenancesController::class, "store"])->name("maintenances.store");
    Route::get('/maintenances/create', [MaintenancesController::class, 'create'])->name('maintenances.create');
    Route::get('/maintenances/{maintenance}/edit', [MaintenancesController::class, 'edit'])->name('maintenances.edit');
    Route::put('/maintenances/{maintenance}', [MaintenancesController::class, 'update'])->name('maintenances.update');
    Route::delete('/maintenances/{maintenance}', [MaintenancesController::class, 'destroy'])->name('maintenances.destroy');

    //Contrats
    Route::get('/contrats', [ContratsController::class, 'index'])->name('contrats');
    Route::post('/contrats', [ContratsController::class, "store"])->name("contrats.store");
    Route::get('/contrats/create', [ContratsController::class, 'create'])->name('contrats.create');
    Route::get('/contrats/{contrat}/edit', [ContratsController::class, 'edit'])->name('contrats.edit');
    Route::put('/contrats/{contrat}', [ContratsController::class, 'update'])->name('contrats.update');
    Route::delete('/contrats/{contrat}', [ContratsController::class, 'destroy'])->name('contrats.destroy');

    //Addresses
    Route::get('/addresses', [AddressesController::class, 'index'])->name('addresses');
    Route::post('/addresses', [AddressesController::class, "store"])->name("addresses.store");
    Route::get('/addresses/create', [AddressesController::class, 'create'])->name('addresses.create');
    Route::get('/addresses/{address}/edit', [AddressesController::class, 'edit'])->name('addresses.edit');
    Route::put('/addresses/{address}', [AddressesController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{address}', [AddressesController::class, 'destroy'])->name('addresses.destroy');

    //Payments
    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments');
    Route::post('/payments', [PaymentsController::class, "store"])->name("payments.store");
    Route::get('/payments/create', [PaymentsController::class, 'create'])->name('payments.create');
    Route::get('/payments/{payment}/edit', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentsController::class, 'destroy'])->name('payments.destroy');


});

require __DIR__.'/auth.php';
