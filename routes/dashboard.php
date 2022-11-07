<?php

use App\Modules\Admin\Controllers\DashboardController;
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

Route::name('dashboard.')
    ->middleware(['set.locale'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'home'])
            ->name('home');

        Route::get('/change-language/{language}', [DashboardController::class, 'changeLanguage'])
            ->name('change.lang');
    });
