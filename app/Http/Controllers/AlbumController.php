<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AlbumController extends Controller
{

// afficher les albums + image pour illustrer
    function albums(){
        $albums = DB::select("
        SELECT a.id, a.titre, a.creation, 
               (SELECT url FROM photos WHERE album_id = a.id LIMIT 1) AS image_url
        FROM albums a
    ");
            return view("albums", ["albums" => $albums]);
        }

// Affichage de mes albums quand connecter
        function myalbums(){
            $userId = Auth::id();

            $myalbums = DB::select("
            SELECT a.id, a.titre, a.creation, 
                   (SELECT url FROM photos WHERE album_id = a.id LIMIT 1) AS image_url
            FROM albums a
            WHERE a.user_id = ?
        ", [$userId]);
    
        return view("myalbums", ["albums" => $myalbums]);
        }

// affichage des photos de l'album        

    function album($id){
            $photos = DB::select("SELECT * FROM photos WHERE album_id = ?", [$id]);
            $album = DB::select("SELECT * FROM albums WHERE id = ?", [$id]);
            
            foreach ($photos as $photo) {
                $tags = DB::select('
                    SELECT tags.nom 
                    FROM tags
                    JOIN possede_tag ON tags.id = possede_tag.tag_id
                    WHERE possede_tag.photo_id = ?
                ', [$photo->id]);
        
                $photo->tags = $tags; 
            }

            return view("album", [
                "photos" => $photos,
                "album" => $album
            ]);
        }


// Ajout album

    function AlbumEdit(Request $request){
        $titre = $request->input('titre');
        $userId = Auth::id();

        DB::insert("INSERT INTO albums (titre, creation, user_id) VALUES (?, ?, ?)", [
            $titre, 
            now(),     
            $userId        
        ]);
    return redirect()->route('albums');  
    }


    // Delete album
    
    public function deleteAlbum($id)
    {

    $photos = DB::select("SELECT id FROM photos WHERE album_id = ?", [$id]);

    foreach ($photos as $photo) {
        DB::delete("DELETE FROM possede_tag WHERE photo_id = ?", [$photo->id]);
    }

    DB::delete("DELETE FROM photos WHERE album_id = ?", [$id]);
    DB::delete("DELETE FROM albums WHERE id = ?", [$id]);

    return redirect()->route('albums')->with('success', 'Album supprimé avec succès.');
    }
    
    

    
}
