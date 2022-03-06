<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

// setelah login dan berhasil masuk ke /home 
Route::get('/home', 'HomeController@index')->name('home.index');

// kslrhn khusus untuk dengan role admin
Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function(){
	Route::middleware(['role:admin'])->group(function(){
		Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
		Route::resource('user', 'UserController');
		Route::resource('petugas', 'PetugasController');
	});
	// route resource khusus dengan role admin dan petugas
	Route::middleware(['role:admin|petugas'])->group(function(){
		Route::resource('admin-list', 'AdminListController');
		Route::resource('spp', 'SppController');
		Route::resource('pembayaran-spp', 'PembayaranController');
		Route::resource('kelas', 'KelasController');
		Route::resource('siswa', 'SiswaController');
	});
});
// route admin dan petugas dengan route grouping prefix pembayaran
Route::prefix('pembayaran')->middleware(['auth', 'role:admin|petugas'])->group(function(){
	Route::get('bayar', 'PembayaranController@index')->name('pembayaran.index');
	Route::get('bayar/{nisn}', 'PembayaranController@bayar')->name('pembayaran.bayar');
	Route::get('spp/{tahun}', 'PembayaranController@spp')->name('pembayaran.spp');
	Route::post('bayar/{nisn}', 'PembayaranController@prosesBayar')->name('pembayaran.proses-bayar');
	Route::get('status-pembayaran', 'PembayaranController@statusPembayaran')
		->name('pembayaran.status-pembayaran');

	Route::get('status-pembayaran/{siswa:nisn}', 'PembayaranController@statusPembayaranShow')
		->name('pembayaran.status-pembayaran.show');

	Route::get('status-pembayaran/{nisn}/{tahun}', 'PembayaranController@statusPembayaranShowStatus')
		->name('pembayaran.status-pembayaran.show-status');
	
	Route::get('history-pembayaran', 'PembayaranController@historyPembayaran')
		->name('pembayaran.history-pembayaran');
	
	Route::get('history-pembayaran/preview/{id}', 'PembayaranController@printHistoryPembayaran')
		->name('pembayaran.history-pembayaran.print');
	
	Route::get('laporan', 'PembayaranController@laporan')->name('pembayaran.laporan');
	Route::post('laporan', 'PembayaranController@printPdf')->name('pembayaran.print-pdf');
});


// Route Profile
Route::get('/profile', 'ProfileController@index');
Route::resource('profile', 'ProfileController');

