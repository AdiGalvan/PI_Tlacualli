<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\registro;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sexos = DB::table('sexos')->get();
        $roles = DB::table('roles')->get();
        $estados = DB::table('estados')->get();

        return view('registro_usuario', compact('sexos', 'roles', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(registro $req)
    {
        if ($req->filled('_mun')) {
            $municipioId = DB::table('municipios')->insertGetId([
                'nombre' => $req->input('_mun'),
                'id_estado' => $req->input('_edo'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $coloniaId = DB::table('colonias')->insertGetId([
                'nombre' => $req->input('_col'),
                'id_municipio' => $municipioId,
                'CP' => $req->input('_cp'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $calleId = DB::table('calles')->insertGetId([
                'nombre' => $req->input('_ca'),
                'id_colonia' => $coloniaId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $direccionId = DB::table('direcciones')->insertGetId([
                'num_ext' => $req->input('_ne'),
                'num_int' => $req->input('_ni'),
                'id_calle' => $calleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $checkbox = $req->input('copy_address') ? 1 : 0;

            if ($checkbox == 1) {
                $direccionId_fiscal = $direccionId;
            } else {
                $municipioId_fiscal = DB::table('municipios')->insertGetId([
                    'nombre' => $req->input('_mun_fiscal'),
                    'id_estado' => $req->input('_edo_fiscal'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $coloniaId_fiscal = DB::table('colonias')->insertGetId([
                    'nombre' => $req->input('_col_fiscal'),
                    'id_municipio' => $municipioId_fiscal,
                    'CP' => $req->input('_cp_fiscal'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $calleId_fiscal = DB::table('calles')->insertGetId([
                    'nombre' => $req->input('_ca_fiscal'),
                    'id_colonia' => $coloniaId_fiscal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $direccionId_fiscal = DB::table('direcciones')->insertGetId([
                    'num_ext' => $req->input('_ne_fiscal'),
                    'num_int' => $req->input('_ni_fiscal'),
                    'id_calle' => $calleId_fiscal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $id_usuario = DB::table('usuarios')->insertGetId([
                'nombre_usuario' => $req->input('_nu'),
                'correo' => $req->input('_email'),
                'contraseña' => Hash::make($req->input('_pd')),
                'nombre' => $req->input('_nu'),
                'apellido_paterno' => $req->input('_ap'),
                'apellido_materno' => $req->input('_am'),
                'id_direccion_envios' => $direccionId,
                'RFC' => $req->input('_rfc'),
                'id_direccion_fiscal' => $direccionId_fiscal,
                'telefono' => $req->input('_tel'),
                'id_sexo' => $req->input('_sx'),
                'id_rol' =>  $req->input('_rol'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $id_usuario = DB::table('usuarios')->insertGetId([
            'nombre_usuario' => $req->input('_nu'),
            'correo' => $req->input('_email'),
            'contraseña' => Hash::make($req->input('_pd')),
            'nombre' => $req->input('_nu'),
            'apellido_paterno' => $req->input('_ap'),
            'apellido_materno' => $req->input('_am'),
            'RFC' => $req->input('_rfc'),
            'telefono' => $req->input('_tel'),
            'id_sexo' => $req->input('_sx'),
            'id_rol' =>  $req->input('_rol'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session(['usuario' => $req->input('_nu')]);
        session(['id_usuario' => $id_usuario]);

        return redirect('/')->with('Confirmacion_registro', "Registro exitoso, bienvenido " . session('usuario'));
    }

    public function login(Request $req)
    {
        $email = $req->input('correo');
        $password = $req->input('contraseña');

        // Buscar el usuario en la base de datos
        $usuario = DB::table('usuarios')
            ->select('contraseña', 'nombre_usuario', 'id')
            ->where('estatus', 1)
            ->where('correo', $email)
            ->first();

        // Verificar si el usuario existe
        if (!$usuario) {
            return back()->with('Error_login', "Usuario o contraseña erroneos");
        } else {

            // Verificar si la contraseña es correcta
            if (!Hash::check($password, $usuario->contraseña)) {
                return back()->with('Error_login', "Usuario o contraseña erroneos");
            }
            session(['usuario' => $usuario->nombre_usuario]);
            session(['id_usuario' => $usuario->id]);

            return redirect('/')->with('Confirmacion_login', "Registro exitoso, bienvenido " . session('usuario'));
        }
    }

    public function logout()
    {
        Session::forget('usuario');
        Session::forget('id_usuario');
        return redirect('/')->with('Confirmacion_logout', 'Haz cerrado sesión correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
