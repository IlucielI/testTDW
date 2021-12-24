<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class,'index']);
Route::get('/products', [PagesController::class,'products']);

Route::group(['middleware' => ['guest']], function () {
Route::get('/login', [PagesController::class,'login']);
Route::post('/login', [AuthController::class,'signIn']);
Route::get('/register', [PagesController::class,'register']);
Route::post('/register', [AuthController::class,'signUp']);
});
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth');
//admin
Route::group(['middleware' => ['checkRole:admin']], function () {
  Route::get('/admin', [PagesController::class,'admin_dashboard']);
  Route::get('/admin/products', [PagesController::class,'admin_products']);
  Route::get('/admin/addProduct', [ProductController::class, 'create']);
  Route::post('/admin/addProduct', [ProductController::class, 'store']);
  Route::get('/admin/editProduct/{id}', [ProductController::class, 'edit']);
  Route::post('/admin/editProduct/{id}', [ProductController::class, 'update']);
  Route::get('/admin/detailProduct/{id}', [ProductController::class, 'show']);
  Route::post('/admin/deleteProduct', [ProductController::class, 'destroy']);
});
