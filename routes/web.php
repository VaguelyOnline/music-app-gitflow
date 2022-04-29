<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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

Route::get('/', function () {
    return view('welcome');
});

// Show the form for creating a new Artist
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');

// Handle the form for creating an Artist (store the record in the db)
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');

Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');

Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');

// Policies can be applied via the 'can' middleware declaration
// Route::get('playlists/{playlist}', [PlaylistController::class, 'show'])
//     ->can('view', 'playlist')
//     ->name('playlists.show');

// Wires up all CRUD routes in a single function call!!
Route::resource('playlists', PlaylistController::class);

Route::get('text-info', function () {
    return view('playground');
});

require __DIR__.'/auth.php';
