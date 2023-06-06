<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WelcomeController;
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

Route::group(['prefix' => 'admin'], function() {

    // Login del panel de administración.
    Route::get('/', [LoginController::class, 'loginForm']);
    Route::get ('/login', [LoginController::class, 'loginForm']);
    Route::post('/login', [LoginController::class, 'validar'])->name('validateLogin');
    Route::get ('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::group(['middleware' => ['authenticateMiddleware']], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home');

        Route::get('/about', [AboutController::class, 'detail'])->name('about');
        Route::put('/about/{ab_id}/save', [AboutController::class, 'aboutSave'])->name('about.save');

        Route::get('/service', [ServiceController::class, 'list'])->name('services');
        Route::get('/service/new', [ServiceController::class, 'newService'])->name('service.new');
        Route::post('/service/save', [ServiceController::class, 'saveService'])->name('service.save');
        Route::get('/service/{ser_id}/detail', [ServiceController::class, 'detailService'])->name('service.detail');
        Route::get('/service/{ser_id}/edit', [ServiceController::class, 'editService'])->name('service.edit');
        Route::put('/service/{ser_id}/update', [ServiceController::class, 'updateService'])->name('service.update');
        Route::delete('/service/{ser_id}/delete', [ServiceController::class, 'deleteService'])->name('service.delete');
        Route::get('/service/{ser_id}/status', [ServiceController::class,'statusService'])->name('service.status');
        Route::get('/service/order', [ServiceController::class,'orderService'])->name('service.order');
        Route::post('/service/{ser_id}/icon', [ServiceController::class,'iconService'])->name('service.icon');
    });

});

Route::get('/', [WelcomeController::class, 'home'])->name('p.home');
Route::get('/resume', [WelcomeController::class, 'resume'])->name('p.resume');
Route::get('/portfolio', [WelcomeController::class, 'portfolio'])->name('p.portfolio');
Route::get('/portfolio/detail', [WelcomeController::class, 'portfolioDetail'])->name('p.portfolio.detail');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('p.contact');


