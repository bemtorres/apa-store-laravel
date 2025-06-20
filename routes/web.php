<?php

use App\Http\Controllers\APIServicesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\TiendaWWWController;
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
  Route::post('home', [HomeController::class, 'indexPost'])->name('home.index.post');
  // Route::get('tutoriales', [HomeController::class, 'tutorial'])->name('home.tutorial');

  Route::get('admin/perfil', [HomeController::class, 'perfil'])->name('admin.perfil');
  Route::put('admin/perfil', [HomeController::class, 'perfilUpdate'])->name('admin.perfil.update');


  Route::resource('admin/producto', ProductoController::class)->names('admin.producto');

  Route::get('admin/tienda', [TiendaController::class, 'index'])->name('admin.tienda.index');
  Route::put('admin/tienda', [TiendaController::class, 'update'])->name('admin.tienda.update');


  Route::get('admin/tiendas', [TiendasController::class, 'index'])->name('admin.tiendas.index');
  Route::get('admin/tiendas/{dominio}', [TiendasController::class, 'show'])->name('admin.tiendas.show');
  Route::put('admin/tiendas/{dominio}', [TiendasController::class, 'update'])->name('admin.tiendas.update');

  // INTERNO
  Route::put('collapse',[HomeController::class, 'collapse'])->name('view.collapse');
});


Route::get('tienda', [TiendaWWWController::class, 'index'])->name('tienda.index');
Route::get('tienda/{dominio}', [TiendaWWWController::class, 'show'])->name('tienda.show');
Route::get('tienda/{dominio}/producto/{codigo}', [TiendaWWWController::class, 'producto'])->name('tienda.producto.show');


Route::get('api/v1/{dominio}', [APIServicesController::class, 'dominio'])->name('api.services.dominio.show');
Route::get('api/v1/{dominio}/productos', [APIServicesController::class, 'productos'])->name('api.services.productos.index');
Route::get('api/v1/{dominio}/productos/{codigo}', [APIServicesController::class, 'producto'])->name('api.services.productos.show');
