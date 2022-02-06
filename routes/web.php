<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('logout',function(\Illuminate\Http\Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});

Route::get('admin-page', function() {
    return 'Halaman untuk Admin ';
})->middleware('role:admin')->name('admin.page');

Route::get('resepsionis-page', function() {
    return 'Halaman untuk resepsionis';
})->middleware('role:resepsionis')->name('resepsionis.page');

Route::get('user-page', function() {
    return view('welcome');
})->middleware('role:user')->name('user.page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
