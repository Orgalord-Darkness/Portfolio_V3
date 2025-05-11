<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'blade']);

Route::get('/app', function () {
    return file_get_contents(public_path('vue.html'));
})->where('any', '.*');

Route::get('/projets', function () {
    return file_get_contents(public_path('vue.html'));
})->where('any', '.*');

Route::get('/parcours', function () {
    return file_get_contents(public_path('vue.html'));
})->where('any', '.*');

Route::get('/contact', function () {
    return file_get_contents(public_path('vue.html'));
})->where('any', '.*');