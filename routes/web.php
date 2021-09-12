<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Middleware\ActivityTick;

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
Route::group([
    'middleware' => [ActivityTick::class]
], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/page1', function () {
        return view('page1');
    });

    Route::get('/page2', function () {
        return view('page2');
    });

    Route::get('/page3', function () {
        return view('page3');
    });

    Route::get('dashboard', function () {
        return redirect('/admin/dashboard');
    })->name('dashboard');

    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::get('', function () {
            return redirect('/admin/dashboard');
        });

        Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
            Route::get('dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            Route::get('activity', function () {
                return view('activity');
            })->name('dashboard-activity');
        });
    });

});
