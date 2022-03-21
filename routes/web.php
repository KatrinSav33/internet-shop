<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost']);

Route::middleware('auth')->group(function (){

    Route::middleware('role:user,admin')->group(function (){

        Route::middleware('role:admin')->group(function (){
            Route::group(['prefix' => '/admin', 'as' => 'admin.'], function (){
                Route::resource('/product', ProductController::class);
            });
        });
    });

    Route::get('cabinet', [UserController::class, 'cabinet'])->name('cabinet');
    Route::get('/cabinet/edit', [UserController::class, 'cabinetEdit'])->name('cabinetEdit');
    Route::post('/cabinet/edit', [UserController::class, 'cabinetEditPost']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
