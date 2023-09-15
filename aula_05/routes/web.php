<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('alo', function () {
    echo "Ola Mundo!!!";
});

Route::get('ola',[HomeController::class,'index']);

// Route::get('ola2','HomeController@index2');

Route::get('produtos',[ProdutoController::class,'index']);
Route::get('produtos/{id}',[ProdutoController::class,'show']);
