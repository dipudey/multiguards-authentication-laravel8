<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin',[AdminController::class,'create'])->middleware('checkadmin')->name('admin');
Route::post('/admin',[AdminController::class,'store'])->name('admin.login');
Route::get('/admin/dashboard',[AdminController::class,'index'])->middleware(['auth:admin'])->name('admin.dashboard');
Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout')->middleware('auth:admin');