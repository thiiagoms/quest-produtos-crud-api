<?php

use App\Http\Controllers\ProductController;
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
Route::get('', function () {
    return to_route('product.index');
});

Route::controller(ProductController::class)
    ->prefix('produto')
    ->name('product.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('visualizar/{id}', 'show')->name('show');

        Route::get('cadastrar', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('editar/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');

        Route::delete('deletar/{id}', 'destroy')->name('delete');
    });
