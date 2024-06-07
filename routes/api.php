<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
    //// RUTA PARA EL BUSCADOR \\\\
    Route::get('/cerdas/buscador', 'ApiController@buscador')->name('cerdas.buscador');

    ////// RUTAS CRUD USERS \\\\\\
    Route::controller(ApiController::class)->group(function () {
        // Ruta GET para visualizar todos los usuarios
        Route::get('/usuarios', "get_users");
        // Ruta GET para visualizar un usuario
        Route::get('/usuarios/{id}', "get_user");
        // Ruta POST para guardar un usuario
        Route::post('/usuarios', "store_user");
        // Ruta PUT para actualizar informacion de un usuario
        Route::put('/usuarios/{id}', "update_user");
        // Ruta DELETE para eliminar usuario
        Route::delete("/usuarios/{id}", "delete_user");
    });

    ////// RUTAS CRUD NAVES \\\\\\
    Route::controller(ApiController::class)->group(function () {
        // Ruta GET para visualizar todas las naves
        Route::get('/naves', "get_naves");
        // Ruta GET para visualizar una nave
        Route::get('/naves/{id}', "get_nave");
        // Ruta POST para guardar una nave
        Route::post('/naves', "store_nave");
        // Ruta PUT para actualizar informacion de una nave
        Route::put('/naves/{id}', "update_nave");
        // Ruta DELETE para eliminar una nave
        Route::delete("/naves/{id}", "delete_nave");
    });

    ////// RUTAS CRUD CERDAS \\\\\\
    Route::controller(ApiController::class)->group(function () {
        // Ruta GET para visualizar todas las cerdas
        Route::get('/cerdas', "get_cerdas");
        // Ruta GET para visualizar una cerdas
        Route::get('/cerdas/{id}', "get_cerda");
        // Ruta POST para guardar una cerdas
        Route::post('/cerdas', "store_cerda");
        // Ruta PUT para actualizar informacion de una cerda
        Route::put('/cerdas/{id}', "update_cerda");
        // Ruta DELETE para eliminar una cerda
        Route::delete("/cerdas/{id}", "delete_cerda");
    });

    ////// RUTAS CRUD CUBRICIONES \\\\\\
    Route::controller(ApiController::class)->group(function () {
        // Ruta GET para visualizar todas las cubriciones
        Route::get('/cubriciones', "get_cubriciones");
        // Ruta GET para visualizar una cubricion
        Route::get('/cubriciones/{id}', "get_cubricion");
        // Ruta POST para guardar una cubricion
        Route::post('/cubriciones', "store_cubricion");
        // Ruta PUT para actualizar informacion de una cubricion
        Route::put('/cubriciones/{id}', "update_cubricion");
        // Ruta DELETE para eliminar cubriciones
        Route::delete("/cubriciones/{id}", "delete_cubriciones");
    });

    ////// RUTAS CRUD MEDICAMENTOS \\\\\\
    Route::controller(ApiController::class)->group(function () {
        // Ruta GET para visualizar todas las medicamentos
        Route::get('/medicamentos', "get_medicamentos");
        // Ruta GET para visualizar una medicamento
        Route::get('/medicamentos/{id}', "get_medicamento");
        // Ruta POST para guardar una medicamento
        Route::post('/medicamentos', "store_medicamento");
        // Ruta PUT para actualizar informacion de una medicamento
        Route::put('/medicamentos/{id}', "update_medicamento");
        // Ruta DELETE para eliminar medicamentos
        Route::delete("/medicamentos/{id}", "delete_medicamento");
    });

    ////// RUTAS CRUD TRATAMIENTOS \\\\\\
    Route::controller(ApiController::class)->group(function () {
        // Ruta GET para visualizar todos los tratamientos
        Route::get('/tratamientos', "get_tratamientos");
        // Ruta GET para visualizar un tratamiento
        Route::get('/tratamientos/{id}', "get_tratamiento");
        // Ruta GET para visualizar tratamientos de una cerda
        Route::get('/tratamientos/cerda/{id}', "get_tratamiento_cerda");
        // Ruta POST para guardar un tratamiento
        Route::post('/tratamientos', "store_tratamiento");
        // Ruta PUT para actualizar un tratamiento
        Route::put('/tratamientos/{id}', "update_tratamiento");
        // Ruta DELETE para eliminar tratamiento
        Route::delete("/tratamientos/{id}", "delete_tratamiento");
    });