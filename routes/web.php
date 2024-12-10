<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\OriginalController;



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
    return redirect('/accueil');
});

Route::get("/accueil", [OriginalController::class, 'accueil']);

Route::get("/accueil/albums", [AlbumController::class, 'albums'])->name('albums');
Route::get("/accueil/albums/{id}", [AlbumController::class, 'album'])->name('albums.photos');
Route::post("/accueil/albums/edit", [AlbumController::class, 'AlbumEdit']);
Route::get("/accueil/myalbums", [AlbumController::class, 'myalbums'])->name('myalbums');
Route::get('/tags/{tag}', [AlbumController::class, 'tag'])->name('tags');
Route::delete('/accueil/albums/{id}', [AlbumController::class, 'deleteAlbum'])->name('album.delete');

Route::get('/recherche', [PhotoController::class, 'recherche'])->name('recherche');
Route::post('/accueil/albums/{id}/photo', [PhotoController::class, 'PhotoEdit'])->name('photo.edit');
Route::delete('/accueil/albums/photo/{id}', [PhotoController::class, 'deletePhoto'])->name('photo.delete');
