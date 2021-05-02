<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadUsuarios2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');
Route::post('painel', [UsuarioController::class, 'login'])->name('usuarios.login'); //vai executar o login do usuarioController


Route::get('usuarios2', [CadUsuarios2Controller::class, 'index'])->name('usuarios2.index'); 
Route::post('usuarios2', [CadUsuarios2Controller::class, 'insert'])->name('usuarios2.insert');
Route::get('usuarios2/inserir', [CadUsuarios2Controller::class, 'create'])->name('usuarios2.inserir');
Route::get('usuarios2/{item}/edit', [CadUsuarios2Controller::class, 'edit'])->name('usuarios2.edit');
Route::put('usuarios2/{item}', [CadUsuarios2Controller::class, 'editar'])->name('usuarios2.editar');

Route::delete('usuarios2/{item}', [CadUsuarios2Controller::class, 'delete'])->name('usuarios2.delete');
Route::get('usuarios2/{item}/delete', [CadUsuarios2Controller::class, 'modal'])->name('usuarios2.modal');

Route::get('home-admin', [AdminController::class, 'index'])->name('admin.index'); 
Route::get('/', [UsuarioController::class, 'logout']) ->name('usuarios.logout');
Route::put('admin/{usuario}', [AdminController::class, 'editar'])->name('admin.editar');
