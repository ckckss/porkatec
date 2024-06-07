<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/admin', function () {
        return Inertia::render('Admin');
    })->name('admin')->middleware(['auth', 'permission:admin_bypass']);

    Route::get('/dashboard', function () {
        return Inertia::render('Home');
    })->name('dashboard');

    Route::get('/home', function () {
        return Inertia::render('Home');
    })->name('home');

    Route::get('/usuarios', function () {
        return Inertia::render('Usuarios');
    })->name('usuarios')->middleware(['auth', 'permission:usuarios_bypass,']);
    
    Route::get('/cerdas', function () {
        return Inertia::render('Cerdas');
    })->name('cerdas');

    Route::get('/naves', function () {
        return Inertia::render('Naves');
    })->name('naves');

    Route::get('/medicamentos', function () {
        return Inertia::render('Medicamentos');
    })->name('medicamentos');

    Route::get('/nfcreader', function () {
        return Inertia::render('LectorNFC');
    })->name('nfcreader');

    Route::get('/fichas/{id_cerda}', function () {
        return Inertia::render('CubricionesCerda');
    })->name('fichas/{id_cerda}');

    Route::get('/tratamientos/{id_cerda}', function () {
        return Inertia::render('TratamientosCerda');
    })->name('tratamientos/{id_cerda}');
});
