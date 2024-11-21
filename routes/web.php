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
    return view('welcome');
});

Route::get("/accueil", [OriginalController::class, 'accueil']);

Route::get("/accueil/albums", [AlbumController::class, 'albums']);
Route::get("/accueil/albums/{id}", [AlbumController::class, 'album']);
Route::post("/accueil/albums/edit", [AlbumController::class, 'AlbumEdit']);


Route::get("/tags/{tag}", [PhotoController::class, 'tag']);
Route::get("/recherche", [PhotoController::class, 'recherche']);
Route::post("/photo/edit", [PhotoController::class, 'PhotoEdit']);