<?php

use App\Http\Controllers\DtPipolController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



//* Definimos nesutra ruta
// OjO -> en el metodo VIEW se acepta 3 parametros -> ('Aca va el nombre de la ruta'), (el view que se va a devolver), (Datos)
Route::view('/contact', 'contacto')->name('contacto');

Route::view('/', 'inicio')->name('inicio');

// OjO -> en un metodo GET solo se aceptan 2 parametros[Ruta, focable o function]
// OjO -> Las rutas importan
Route::get('/blogg', [PostController::class, 'index'])->name('posts.index');
Route::get('/blogg/crear', [PostController::class, 'create'])->name('posts.crear');
Route::post('/blogg', [PostController::class, 'store'])->name('posts.store');
Route::get('/blogg/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/blogg/{post}/editar', [PostController::class, 'editar'])->name('posts.editar');
Route::patch('/blog/{post}', [PostController::class,'update'])->name('posts.update');

Route::get('/abouting', function () {
    $dtPipol = [
        ['numPerson' => 'Pipol 1'],
        ['numPerson' => 'Pipol 2'],
        ['numPerson' => 'Pipol 3'],
        ['numPerson' => 'Pipol 4'],
    ];

    //? La funcion view() recibe 2 parametros 
    //OjO -> ('Nombre de la vista'), (Datos)!Opcional
    return view('about', ['dtPipol' => $dtPipol]);
})->name('about');

Route::get('/usandocontrolador', [DtPipolController::class, 'getDtPipol'])->name('usando');
