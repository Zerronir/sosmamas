<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// GET ROUTES (PRODUCTOS)
Route::get("/listProducts", [UserController::class, "getProductsAPI"]);
Route::get("/listProductos/{tipo}", [UserController::class, "getCategoryAPI"]);

// POST ROUTES (Productos)
Route::post("/api/newProdudct", [UserController::class, "newProductAPI"]);


// POST ROUTES
Route::post("/api/register", [UserController::class, "registerUserAPI"]);
Route::get("/api/doLogin", [UserController::class, "getUserAPI"]);
