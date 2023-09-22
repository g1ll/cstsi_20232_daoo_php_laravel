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

//create
Route::get('produto',[ProdutoController::class,'create'])
    ->name('produto-create');
Route::post('produto',[ProdutoController::class,'store']);

//update
Route::get('produto/{id}/edit',[ProdutoController::class,'edit'])
    ->name('produto-edit');
Route::post('produto/{id}/update',[ProdutoController::class,'update'])
    ->name('produto-update');;
//delete
Route::get('produto/{id}/delete',[ProdutoController::class,'delete'])
    ->name('produto-delete');
Route::post('produto/{id}/remove',[ProdutoController::class,'remove'])
    ->name('produto-remove');
