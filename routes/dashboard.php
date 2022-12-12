<?php

use App\Modules\Admin\Controllers\AuthController;
use App\Modules\Admin\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Modules\Blog\Controllers\BlogController;
use App\Modules\City\Controllers\CityController;
use App\Modules\Admin\Controllers\LanguageController;
use App\Modules\Admin\Controllers\DashboardController;
use App\Modules\Country\Controllers\CountryController;
use App\Modules\BlogCategory\Controllers\BlogCategoryController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Dashboard web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('dashboard.')
    ->middleware(['set.locale'])
    ->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])
            ->name('login.show');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login.submit');

        Route::middleware(['auth'])
            ->group(function () {
                Route::get('/', [DashboardController::class, 'home'])
                    ->name('home');

                Route::post('logout', [AuthController::class, 'logout'])
                    ->name('logout');

                // Language Routes
                Route::resource('language', LanguageController::class)
                    ->only(['index']);

                Route::get('change-language/{language}', [DashboardController::class, 'changeLanguage'])
                    ->name('change.lang');

                // User Routes
                Route::resource('user', UserController::class);

                // Country Routes
                Route::prefix('country')
                    ->group(function () {
                        Route::resource('/', CountryController::class)
                            ->except(['show']);

                        Route::delete('/delete/{id}', [CountryController::class, 'forceDelete'])
                            ->name('country.force.delete');

                        Route::get('/get_translation', [CountryController::class, 'getTranslation'])
                            ->name('country.get_translation');

                        Route::post('/translation', [CountryController::class, 'setTranslation'])
                            ->name('country.translation');
                    });

                // City Routes
                Route::prefix('city')
                    ->group(function () {
                        Route::resource('/', CityController::class)
                            ->except(['show']);

                        Route::delete('/delete/{id}', [CityController::class, 'forceDelete'])
                            ->name('city.force.delete');

                        Route::get('/get_translation', [CityController::class, 'getTranslation'])
                            ->name('city.get_translation');

                        Route::post('/translation', [CityController::class, 'setTranslation'])
                            ->name('city.translation');
                    });

                // BlogCategory Routes
                Route::prefix('blog-category')
                    ->group(function () {
                        Route::resource('/', BlogCategoryController::class)
                            ->except(['show']);

                        Route::delete('/delete/{id}', [BlogCategoryController::class, 'forceDelete'])
                            ->name('blog-category.force.delete');

                        Route::get('/get_translation', [BlogCategoryController::class, 'getTranslation'])
                            ->name('blog-category.get_translation');

                        Route::post('/translation', [BlogCategoryController::class, 'setTranslation'])
                            ->name('blog-category.translation');
                    });

                // Blog Routes
                Route::prefix('blog')
                    ->group(function () {
                        Route::resource('/', BlogController::class)
                            ->except(['show']);

                        Route::delete('/delete/{id}', [BlogController::class, 'forceDelete'])
                            ->name('blog.force.delete');

                        Route::get('/get_translation', [BlogController::class, 'getTranslation'])
                            ->name('blog.get_translation');

                        Route::post('/translation', [BlogController::class, 'setTranslation'])
                            ->name('blog.translation');
                    });
            });
    });
