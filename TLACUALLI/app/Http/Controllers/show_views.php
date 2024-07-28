<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

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
        /* if (Auth::check()) {
            dd(Auth::user());
        } */
        return view('home', ['usuario' => $this->usuario]);
    }

    public function productos()
    {
        return view('productos');
    }

    public function mis_productos()
    {
        return view('mis_productos');
    }

    public function publicaciones()
    {
        return view('publicaciones', ['usuario' => $this->usuario]);
    }

    public function servicios()
    {
        return view('servicios.mis_servicios');
    }

    public function mis_talleres()
    {
        return view('mis_talleres');
    }

    public function talleres()
    {
        return view('talleres', ['usuario' => $this->usuario]);
    }
}
