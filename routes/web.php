<?php

use Illuminate\Support\Facades\Route;

Route::get('login', [\App\Http\Controllers\Logincontroller::class, 'index']);
Route::post('actionLogin', [\App\Http\Controllers\Logincontroller::class, 'actionLogin'])->name('actionLogin');
Route::resource('belajar', \App\Http\Controllers\Belajarcontroller::class);
Route::resource('user', \App\Http\Controllers\Usercontroller::class);
Route::get('tambah', [\App\Http\Controllers\Belajarcontroller::class, 'tambah']);
Route::post('store_tambah', [\App\Http\Controllers\Belajarcontroller::class, 'storeTambah'])->name('store_tambah');
Route::get('kurang', [\App\Http\Controllers\Belajarcontroller::class, 'kurang']);
Route::post('store_kurang', [\App\Http\Controllers\Belajarcontroller::class, 'storeKurang'])->name('store_kurang');
Route::resource('dashboard', \App\Http\Controllers\Dashboardcontroller::class);
Route::resource('category', \App\Http\Controllers\Categorycontroller::class);


// Route::get('delete',$id);

Route::get('/', function () {
    return view('tambah');

});
Route::get('/', function () {
    return view('kurang');
});
Route::get('/', function () {
    return view('login');
});