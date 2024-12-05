<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PhotoController extends Controller
{
    function PhotoEdit(Request $request, $id){
        $titre = $request->input('titre');
        $url = $request->input('url');
        $note = $request->input('note');
    
        DB::insert("INSERT INTO photos (titre, url, note, album_id) VALUES (?, ?, ?, ?)", [
            $titre, 
            $url, 
            $note,
            $id         
        ]);
    
        return redirect()->route('albums.photos', ['id' => $id]);
    }


    public function recherche(Request $request)
{
    $query = $request->input('q');

    $photos = DB::select("
        SELECT DISTINCT photos.*
        FROM photos
        LEFT JOIN albums ON albums.id = photos.album_id
        LEFT JOIN possede_tag ON possede_tag.photo_id = photos.id
        LEFT JOIN tags ON tags.id = possede_tag.tag_id
        WHERE photos.titre LIKE ?
           OR albums.titre LIKE ?
           OR tags.nom LIKE ?
    ", ['%' . $query . '%', '%' . $query . '%', '%' . $query . '%']);

    return view('recherche', compact('photos', 'query'));
}


}
