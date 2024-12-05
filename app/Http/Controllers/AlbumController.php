<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    function album($id){
            $photos = DB::select("SELECT * FROM photos WHERE album_id = ?", [$id]);
            $album = DB::select("SELECT * FROM albums WHERE id = ?", [$id]);
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
