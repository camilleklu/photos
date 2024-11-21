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
}