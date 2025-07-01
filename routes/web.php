<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;

use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/',[TareasController::class, 'init']);
    Route::post('/tarea/crear/',[TareasController::class,'create']);
    Route::get('/tareas',[TareasController::class,'index']);
    Route::get('tareas/editar/{id}',[TareasController::class,'editar']);
    Route::post('tareas/editar/{id}',[TareasController::class,'update']);
    Route::get('tareas/cambiar/{id}',[TareasController::class,'cambiar']);
    Route::delete('tareas/eliminar/{id}',[TareasController::class,'delete']);  
    Route::get('/ranking',[RegisteredUserController::class,'puntos']);   
});






require __DIR__.'/auth.php';
