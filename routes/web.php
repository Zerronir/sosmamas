<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View;
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
Route::get('/productos', [View::class, 'products']);
Route::get('/sobre-nosotros', [View::class, 'aboutUs']);
Route::get('/registro', [View::class, 'registro']);

// POST
Route::post('/doRegistro', [UserController::class, 'registro']);
