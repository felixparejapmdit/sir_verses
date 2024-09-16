<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PvEventController;
use App\Http\Controllers\PvEventTypeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\VerseSearchController;

use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionCategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ApiDocumentationController;
use App\Http\Controllers\ActivityLogController;

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

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register'); // No middleware to allow access for both guests and authenticated users
Route::post('/register', [RegisteredUserController::class, 'store']);

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

Route::resource('permissions', PermissionController::class);
Route::get('permissions/show', [PermissionController::class, 'showPermissions'])->name('permissions.show');

Route::get('/users', action: [UserController::class, 'index'])->name('users.index');

Route::resource('users', UserController::class);

Route::resource('groups', GroupController::class);

Route::get('groups/{group}/users', [GroupController::class, 'showUsers'])->name('groups.users');

Route::resource('permission_categories', PermissionCategoryController::class);

Route::get('api_documentations', [ApiDocumentationController::class, 'index'])->name('api_documentations.index');
Route::get('api_documentations/create', [ApiDocumentationController::class, 'create'])->name('api_documentations.create');
Route::post('api_documentations', [ApiDocumentationController::class, 'store'])->name('api_documentations.store');
Route::get('api_documentations/{api_documentation}/edit', [ApiDocumentationController::class, 'edit'])->name('api_documentations.edit');
Route::put('api_documentations/{api_documentation}', [ApiDocumentationController::class, 'update'])->name('api_documentations.update');
Route::delete('api_documentations/{api_documentation}', [ApiDocumentationController::class, 'destroy'])->name('api_documentations.destroy');


Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity_logs.index');
Route::get('activity-logs/{id}', [ActivityLogController::class, 'show'])->name('activity_logs.show');


require __DIR__.'/auth.php';
