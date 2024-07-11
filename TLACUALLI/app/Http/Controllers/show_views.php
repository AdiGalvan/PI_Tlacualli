<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class show_views extends Controller
{

    protected $usuario;

    public function __construct()
    {
        if (session()->has('id')) {
            $this->usuario = DB::table('usuarios')
                ->where('id', session('id'))
                ->first();
        } else {
            $this->usuario = null;
        }
    }

    public function home()
    {
        return view('home', ['usuario' => $this->usuario]);
    }

    public function productos()
    {
        return view('productos', ['usuario' => $this->usuario]);
    }

    public function publicaciones()
    {
        return view('publicaciones', ['usuario' => $this->usuario]);
    }

    public function servicios(){
        return view('servicios.mis_servicios');
    }

    public function mis_talleres(){
        return view('mis_talleres');
    }

    public function talleres()
    {
        return view('talleres', ['usuario' => $this->usuario]);
    }
}
