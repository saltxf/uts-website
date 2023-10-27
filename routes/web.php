<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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
Route::get('/registration', 'RegistrationController@index')->name('registration.index');
Route::resource('registration', RegistrationController::class)->except('destroy');
Route::get('delregistration/{id}', [RegistrationController::class, 'destroy'])
     ->name('registration.destroy');
