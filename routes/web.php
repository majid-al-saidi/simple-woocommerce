<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');


//This is for breeze:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//this is for filament:
Route::get('/admin-login', function () { return redirect('/admin/login'); })->name('admin-login');


//For testing purposes:
Route::get('/home', function () {
    return view('home');
})->name('home');



Route::post('/switch-language', function () {
    
    $locale = request('locale');
    session(['locale' => $locale]);
    app()->setLocale($locale);

    return back();
})->name('language.switch');