<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('root');
Route::get('/registrar', [AuthController::class, 'registrar'])->name('root.registrar');
Route::post('/registrar', [AuthController::class, 'registrarStore'])->name('root.registrar.store');
Route::get('login', [AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::any('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::post('login-admin', [AuthController::class, 'loginAdminIniciar'])->name('login.admin.iniciar');


Route::middleware('auth.user')->group( function () {
  // API
  Route::get('home', [HomeController::class, 'index'])->name('home.index');
  Route::post('home', [HomeController::class, 'indexPost'])->name('home');
  // Route::get('tutoriales', [HomeController::class, 'tutorial'])->name('home.tutorial');

  Route::get('admin/perfil', [HomeController::class, 'perfil'])->name('admin.perfil');
  Route::put('admin/perfil', [HomeController::class, 'perfilUpdate'])->name('admin.perfil.update');


  Route::resource('admin/producto', ProductoController::class)->names('admin.producto');

  // INTERNO
  Route::put('collapse',[HomeController::class, 'collapse'])->name('view.collapse');
});
