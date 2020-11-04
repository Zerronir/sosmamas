<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View;
use App\Http\Controllers\UserController;
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

// GET
Route::get('/', [View::class, 'index']);
Route::get('/perfil', [View::class, 'userPage']);
Route::get('/sobre-nosotros', [View::class, 'aboutUs']);
Route::get('/registro', [View::class, 'registro']);
Route::get('/login', [View::class, 'login']);

// RUTAS DE PRODUCTOS
Route::get('/productos', [View::class, 'products']);
Route::get('/productos/{tipo}', [
    "uses" => "View@listarTipos",
    "as" => "listarTipo"
]);

// POST
Route::post('/doRegistro', [UserController::class, 'register']);
Route::post('/doLogin', [UserController::class, 'login']);
