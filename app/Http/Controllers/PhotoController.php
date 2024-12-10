<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PhotoController extends Controller
{

// Ajout de photos dans l'album
    function PhotoEdit(Request $request, $id){
        $titre = $request->input('titre');
        // $url = $request->file('url');
        $note = $request->input('note');
        $tags = $request->input('tags');

        $file = $request->file('url');
        $fileName = time() . '_' . $file->getClientOriginalName(); 
        $filePath = $file->storeAs('photos', $fileName, 'public'); 
        $url = Storage::url($filePath); 

    
        
        DB::insert("INSERT INTO photos (titre, url, note, album_id) VALUES (?, ?, ?, ?)", [
            $titre, 
            $url, 
            $note,
            $id         
        ]);

// Ajout de tags

    $photoId = DB::getPdo()->lastInsertId();
    if (!empty($tags)) {
        $tagsArray = array_map('trim', explode(',', $tags));

        foreach ($tagsArray as $tagName) {
            $tag = DB::select("SELECT id FROM tags WHERE nom = ?", [$tagName]);
            
            if (empty($tag)) {
                DB::insert("INSERT INTO tags (nom) VALUES (?)", [$tagName]);
                $tagId = DB::getPdo()->lastInsertId();
            } else {
                $tagId = $tag[0]->id;
            }

            DB::insert("INSERT INTO possede_tag (photo_id, tag_id) VALUES (?, ?)", [$photoId, $tagId]);
        }
    }   
    
        return redirect()->route('albums.photos', ['id' => $id]);
     }


// Recherche selon les titres des photos, des albums et des tags

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



// Delete les photos

public function deletePhoto($id)
{
    DB::delete("DELETE FROM possede_tag WHERE photo_id = ?", [$id]);
    DB::delete("DELETE FROM photos WHERE id = ?", [$id]);

    return redirect()->back()->with('success', 'Photo supprimée avec succès.');
}



}