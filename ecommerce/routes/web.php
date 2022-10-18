<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedoresController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

/*
Route::resource('/clientes',
                App\Http\Controllers\ClienteController::class)->middleware(['auth']);

Route::resource('/vendedores',
                App\Http\Controllers\VendedoresController::class)->middleware(['auth']);
*/

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
    Route::resource('/clientes', App\Http\Controllers\ClienteController::class);
    Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class);
});

