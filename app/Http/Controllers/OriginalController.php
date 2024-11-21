<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OriginalController extends Controller
{
    //

    function accueil(){
        return view("accueil");
}

}
