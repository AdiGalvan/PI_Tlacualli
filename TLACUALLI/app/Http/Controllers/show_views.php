<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class show_views extends Controller
{

    public function home(){
        return view('home');
    }

    public function productos(){
        return view('productos');
    }

    public function publicaciones(){
        return view('publicaciones');
    }

    public function talleres(){
        return view('talleres');
    }

}
