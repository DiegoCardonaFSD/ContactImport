<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactImportFailedController;
use App\Http\Controllers\ContactsImportController;
use App\Http\Controllers\ProcessImportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {

    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/{contact}', [ContactController::class, 'show'])->name('show');

});

Route::group(['prefix' => 'contacts-import', 'as' => 'contacts-import.'], function () {
    Route::get('/', [ContactsImportController::class, 'index'])->name('index');
    Route::post('/', [ContactsImportController::class, 'store'])->name('store');
    Route::get('/create', [ContactsImportController::class, 'create'])->name('create');
    Route::get('/{file}', [ContactsImportController::class, 'show'])->name('show');
});

Route::post('process-import', [ProcessImportController::class, 'store'])->name('process-import.store');



Route::group(['prefix' => 'contacts-import-failed', 'as' => 'contacts-import-failed.'], function () {
    Route::get('/{file}', [ContactImportFailedController::class, 'index'])->name('index');
    Route::get('/failed/{failedContact}', [ContactImportFailedController::class, 'show'])->name('show');
});


Route::get('mail', function(){
   Mail::to('diego0123@gmail.com')->send(new \App\Mail\FinishProcessEmail());
});
