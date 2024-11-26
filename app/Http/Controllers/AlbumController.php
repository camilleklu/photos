<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlbumController extends Controller
{
    function albums(){
            $albums = DB::select("SELECT * FROM albums");
            return view("albums", ["albums" => $albums]);
        }

    function album($id){
            $photos = DB::select("SELECT * FROM photos WHERE album_id = ?", [$id]);
            return view("album", ["photos" => $photos]);
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
