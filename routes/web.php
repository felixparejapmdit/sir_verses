<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PvEventController;
use App\Http\Controllers\PvEventTypeController;

use App\Http\Controllers\VerseSearchController;

use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events', [PvEventController::class, 'index'])->name('events.index');
Route::get('/events/create', [PvEventController::class, 'create'])->name('events.create');
Route::put('/events/{id}', [PvEventController::class, 'update'])->name('events.update');
Route::post('/events', [PvEventController::class, 'store'])->name('events.store');


Route::get('/eventtypes', [PvEventTypeController::class, 'index'])->name('eventtypes.index');
Route::get('/eventtypes/create', [PvEventTypeController::class, 'create'])->name('eventtypes.create');
Route::put('/eventtypes/{id}', [PvEventTypeController::class, 'update'])->name('eventtypes.update');
Route::post('/eventtypes', [PvEventTypeController::class, 'store'])->name('eventtypes.store');

Route::get('/verses', function () {
    return view('verses');
})->middleware(['auth', 'verified'])->name('verses');



Route::get('/verse-search', [VerseSearchController::class, 'index'])->name('verse_search');
Route::post('/verse-search/import', [VerseSearchController::class, 'import'])->name('import_verses');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');


require __DIR__.'/auth.php';
