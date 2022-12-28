<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;

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
    return redirect()->route('contacts');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contacts');
    Route::get('/contact/create', 'create')->name('contact-create')->can('is_logged');
    Route::post('/contact/salve', 'store')->name('contact-salve')->can('is_logged');
    Route::get('/contact/show/{id}', 'show')->name('contact-show')->can('is_logged');
    Route::get('/contact/edit/{id}', 'edit')->name('contact-edit')->can('is_logged');
    Route::put('/contact/update/{id}', 'update')->name('contact-update')->can('is_logged');
    Route::delete('/contact/delete/{id}', 'destroy')->name('contact-destroy')->can('is_logged');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
