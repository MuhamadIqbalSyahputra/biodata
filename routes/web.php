<?php

use App\Http\Controllers\PesertadidikPDF;
use App\Http\Controllers\userC;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pesertadidikR;
use App\Http\Controllers\guruR;


Route::get('/', function () {
    return view('dashboard');
});
Route::get('/adminlte', function () {
    return view ('adminlte');
})-> middleware('auth');

Route::get('/dashboard', function () {
    return view ('dashboard');
})-> middleware('auth');

Route::resource('pesertadidik', pesertadidikR::class)-> middleware('auth') ;
Route::resource('guru', guruR::class)-> middleware('auth');
Route::get('pdf',
[PesertadidikPDF::class, 'pdf']);

Route::get('/login', function () {
    return view ('login');
});

Route::get('/register', function () {
    return view ('register');
});

Route::get('register',[userC::class, 'register'])->name('register');
Route::post('register', [userC::class, 'register_action'])->name('register.action');

Route::get('login',[userC::class, 'login'])->name('login');
Route::post('login', [userC::class, 'login_action'])->name('login.action');

Route::get('logout', [userC::class, 'logout'])->name('logout');