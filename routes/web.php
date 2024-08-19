<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;
use App\Models\Card;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cards = Card::all();
    return view('welcome')->with('cards', $cards);
})->name('dash');

Route::get('/create', function (){
    return redirect('/profile/cards');
})->name('create');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
