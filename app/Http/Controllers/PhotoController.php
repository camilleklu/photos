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

}
