<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AlbumController extends Controller
{
    function albums(){
        $albums = DB::select("
        SELECT a.id, a.titre, a.creation, 
               (SELECT url FROM photos WHERE album_id = a.id LIMIT 1) AS image_url
        FROM albums a
    ");
            return view("albums", ["albums" => $albums]);
        }

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

    function AlbumEdit(Request $request){
        $titre = $request->input('titre');

        DB::insert("INSERT INTO albums (titre, creation, user_id) VALUES (?, ?, ?)", [
            $titre, 
            now(),     
            1          
        ]);
    return redirect()->route('albums');  
    }
    
  

    
}
