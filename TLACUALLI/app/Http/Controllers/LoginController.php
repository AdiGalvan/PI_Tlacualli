<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Estados;
use App\Models\Roles;
use App\Models\Sexos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\registro;
use App\Http\Requests\registrou;
use App\Http\Requests\cambio_pd;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->has('id_usuario')) {
            return redirect('/');
        }
        $sexos = DB::table('sexos')->get();
        $roles = DB::table('roles')->get();
        $estados = DB::table('estados')->get();
        return view('registro_usuario', compact('sexos', 'roles', 'estados'));
    }

    public function Login(Request $request)
    {
        $email = $request->input('correo');
        $password = $request->input('contraseña');

        // Buscar el usuario en la base de datos
        $usuario = Usuarios::where('correo', $email)->first();

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($usuario && Hash::check($password, $usuario->contraseña)) {
            Auth::login($usuario);
            return redirect()->intended('/')->with('Confirmacion_login', "Registro exitoso, bienvenido " . $usuario->nombre_usuario);
        } else {
            return back()->with('Error_login', "Usuario o contraseña erróneos");
        }
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        //Invalida sesión
        $request->session()->invalidate();

        //Gerean un nuevo token para la proxima sesión
        $request->session()->regenerateToken();
        
        return redirect('/')->with('Confirmacion_logout', 'Haz cerrado sesión correctamente.');

    }

    public function show ()
    {
        //Otiene el ID del usuario autenticado
        $usuarioId = Auth::id();

        //Por medio del modelo trae lo relacionado
        $usuario = Usuarios::with('sexos', 'roles')->find($usuarioId);
        return view('partials.login.perfil', compact('usuario'));
    }

    public function edit ()
    {
        //Otiene el ID del usuario autenticado
        $usuarioId = Auth::id();

        //Por medio del modelo trae lo relacionado
        $usuario = Usuarios::with([
            'sexos',
            'roles',
            'direccionPersonal.calles',
            'direccionPersonal.colonias',
            'direccionPersonal.municipios',
            'direccionPersonal.estados'
            ])->find($usuarioId);

            $estados = Estados::all();
            $roles = Roles::all();
            $sexos = Sexos::all();
        return view('partials.login.editar_perfil', compact('usuario', 'estados', 'roles', 'sexos'));

    }

    public function update(Request $request)
    {
        //Otiene el ID del usuario autenticado
        $usuarioId = Auth::id();
        $validatorPersonal = $request->validate([
            '_nu'       => 'required|string',
            '_ap'       => 'max:50|string',
            '_fn'       => 'required|string',
            '_email'    => 'required|string',
            //avatar
            '_tel'      => 'max:10|string',
            '_rol'      => 'required|numeric|integer',
            '_am'       => 'max:50|string',
            '_sx'       => 'required|numeric|integer',
            '_rfc'      => 'max:13|string'
        ]);

        $usuario = Usuarios::find($usuarioId);

        if($usuario)
        {
            $usuario->nombre = $validatorPersonal['_nu'];
            $usuario->apellido_paterno = $validatorPersonal['_ap'];
            $usuario->fecha_nacimiento = $validatorPersonal['_fn'];
            $usuario->correo = $validatorPersonal['_email'];
            $usuario->telefono = $validatorPersonal['_tel'];
            $usuario->id_rol = $validatorPersonal['_rol'];
            $usuario->apellido_materno = $validatorPersonal['_am'];
            $usuario->id_sexo = $validatorPersonal['_sx'];
            $usuario->RFC = strtoupper($validatorPersonal['_rfc']);
            $usuario->save();
        }

        return redirect('/perfil')->with('Confirmacion_update', 'Se actualizaron correctamente los datos');
    }
}

// class LoginController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         if (session()->has('id_usuario')) {
//             return redirect('/');
//         }
//         $sexos = DB::table('sexos')->get();
//         $roles = DB::table('roles')->get();
//         $estados = DB::table('estados')->get();

//         return view('registro_usuario', compact('sexos', 'roles', 'estados'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create(registro $req)
//     {
//         if (session()->has('id_usuario')) {
//             return redirect('/');
//         }
//         if ($req->filled('_mun')) {
//             $municipioId = DB::table('municipios')->insertGetId([
//                 'nombre' => $req->input('_mun'),
//                 'id_estado' => $req->input('_edo'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $coloniaId = DB::table('colonias')->insertGetId([
//                 'nombre' => $req->input('_col'),
//                 'id_municipio' => $municipioId,
//                 'CP' => $req->input('_cp'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $calleId = DB::table('calles')->insertGetId([
//                 'nombre' => $req->input('_ca'),
//                 'id_colonia' => $coloniaId,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $direccionId = DB::table('direcciones')->insertGetId([
//                 'num_ext' => $req->input('_ne'),
//                 'num_int' => $req->input('_ni'),
//                 'id_calle' => $calleId,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);

//             $municipioId_fiscal = DB::table('municipios')->insertGetId([
//                 'nombre' => $req->input('_mun_fiscal'),
//                 'id_estado' => $req->input('_edo_fiscal'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $coloniaId_fiscal = DB::table('colonias')->insertGetId([
//                 'nombre' => $req->input('_col_fiscal'),
//                 'id_municipio' => $municipioId_fiscal,
//                 'CP' => $req->input('_cp_fiscal'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $calleId_fiscal = DB::table('calles')->insertGetId([
//                 'nombre' => $req->input('_ca_fiscal'),
//                 'id_colonia' => $coloniaId_fiscal,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $direccionId_fiscal = DB::table('direcciones')->insertGetId([
//                 'num_ext' => $req->input('_ne_fiscal'),
//                 'num_int' => $req->input('_ni_fiscal'),
//                 'id_calle' => $calleId_fiscal,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $id_usuario = DB::table('usuarios')->insertGetId([
//                 'nombre_usuario' => $req->input('_nu'),
//                 'correo' => $req->input('_email'),
//                 'contraseña' => Hash::make($req->input('_pd')),
//                 'nombre' => $req->input('_nu'),
//                 'apellido_paterno' => $req->input('_ap'),
//                 'apellido_materno' => $req->input('_am'),
//                 'id_direccion_envios' => $direccionId,
//                 'fecha_nacimiento' => $req->input('_fn'),
//                 'RFC' => $req->input('_rfc'),
//                 'id_direccion_fiscal' => $direccionId_fiscal,
//                 'telefono' => $req->input('_tel'),
//                 'id_sexo' => $req->input('_sx'),
//                 'id_rol' =>  $req->input('_rol'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//         } else {
//             $id_usuario = DB::table('usuarios')->insertGetId([
//                 'nombre_usuario' => $req->input('_nu'),
//                 'correo' => $req->input('_email'),
//                 'contraseña' => Hash::make($req->input('_pd')),
//                 'nombre' => $req->input('_nu'),
//                 'apellido_paterno' => $req->input('_ap'),
//                 'apellido_materno' => $req->input('_am'),
//                 'fecha_nacimiento' => $req->input('_fn'),
//                 'RFC' => $req->input('_rfc'),
//                 'telefono' => $req->input('_tel'),
//                 'id_sexo' => $req->input('_sx'),
//                 'id_rol' =>  $req->input('_rol'),
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//         }
//         session(['usuario' => $req->input('_nu')]);
//         session(['id_usuario' => $id_usuario]);

//         return redirect('/')->with('Confirmacion_registro', "Registro exitoso, bienvenido " . session('usuario'));
//     }

//     public function login(Request $req)
//     {
//         $email = $req->input('correo');
//         $password = $req->input('contraseña');

//         // Buscar el usuario en la base de datos
//         $usuario = DB::table('usuarios')
//             ->select('contraseña', 'nombre_usuario', 'id')
//             ->where('estatus', 1)
//             ->where('correo', $email)
//             ->first();

//         // Verificar si el usuario existe
//         if (!$usuario) {
//             return back()->with('Error_login', "Usuario o contraseña erroneos");
//         } else {

//             // Verificar si la contraseña es correcta
//             if (!Hash::check($password, $usuario->contraseña)) {
//                 return back()->with('Error_login', "Usuario o contraseña erroneos");
//             }
//             session(['usuario' => $usuario->nombre_usuario]);
//             session(['id_usuario' => $usuario->id]);

//             return redirect('/')->with('Confirmacion_login', "Registro exitoso, bienvenido " . session('usuario'));
//         }
//     }

//     public function logout()
//     {
//         Session::forget('usuario');
//         Session::forget('id_usuario');
//         return redirect('/')->with('Confirmacion_logout', 'Haz cerrado sesión correctamente.');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         return view('partials.login.perfil');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show()
//     {
//         if (!session()->has('id_usuario')) {
//             return redirect(back());
//         }
//         $usuario = DB::table('usuarios')
//             ->where('id', session('id_usuario'))
//             ->first();
//         $sexos = DB::table('sexos')
//             ->where('id', $usuario->id_sexo)
//             ->first();
//         $roles = DB::table('roles')
//             ->where('id', $usuario->id_rol)
//             ->first();
//         if ($usuario->id_direccion_envios != null) {
//             $direccion = DB::table('direcciones')
//                 ->where('id', $usuario->id_direccion_envios)
//                 ->first();
//             $calle = DB::table('calles')
//                 ->where('id', $direccion->id_calle)
//                 ->first();
//             $colonia = DB::table('colonias')
//                 ->where('id', $calle->id_colonia)
//                 ->first();
//             $municipio = DB::table('municipios')
//                 ->where('id', $colonia->id_municipio)
//                 ->first();
//             $estado = DB::table('estados')
//                 ->where('id', $municipio->id_estado)
//                 ->first();
//         } else {
//             $direccion = null;
//             $calle = null;
//             $colonia = null;
//             $municipio = null;
//             $estado = null;
//         }
//         if ($usuario->id_direccion_fiscal != null) {
//             $direccionf = DB::table('direcciones')
//                 ->where('id', $usuario->id_direccion_fiscal)
//                 ->first();
//             $callef = DB::table('calles')
//                 ->where('id', $direccionf->id_calle)
//                 ->first();
//             $coloniaf = DB::table('colonias')
//                 ->where('id', $callef->id_colonia)
//                 ->first();
//             $municipiof = DB::table('municipios')
//                 ->where('id', $coloniaf->id_municipio)
//                 ->first();
//             $estadof = DB::table('estados')
//                 ->where('id', $municipio->id_estado)
//                 ->first();
//         } else {
//             $direccionf = null;
//             $callef = null;
//             $coloniaf = null;
//             $municipiof = null;
//             $estadof = null;
//         }


//         return view('partials.login.perfil', compact('sexos', 'roles', 'usuario', 'direccion', 'calle', 'colonia', 'municipio', 'estado', 'direccionf', 'callef', 'coloniaf', 'municipiof', 'estadof'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit()
//     {
//         if (!session()->has('id_usuario')) {
//             return redirect(back());
//         }
//         $sexos = DB::table('sexos')->get();
//         $roles = DB::table('roles')->get();
//         $estados = DB::table('estados')->get();
//         $usuario = DB::table('usuarios')
//             ->where('id', session('id_usuario'))
//             ->first();


//         if ($usuario->id_direccion_envios != null) {
//             $direccion = DB::table('direcciones')
//                 ->where('id', $usuario->id_direccion_envios)
//                 ->first();
//             $calle = DB::table('calles')
//                 ->where('id', $direccion->id_calle)
//                 ->first();
//             $colonia = DB::table('colonias')
//                 ->where('id', $calle->id_colonia)
//                 ->first();
//             $municipio = DB::table('municipios')
//                 ->where('id', $colonia->id_municipio)
//                 ->first();
//             $estado = DB::table('estados')
//                 ->where('id', $municipio->id_estado)
//                 ->first();
//         } else {
//             $direccion = null;
//             $calle = null;
//             $colonia = null;
//             $municipio = null;
//             $estado = null;
//         }

//         if ($usuario->id_direccion_fiscal != null) {
//             $direccionf = DB::table('direcciones')
//                 ->where('id', $usuario->id_direccion_fiscal)
//                 ->first();
//             $callef = DB::table('calles')
//                 ->where('id', $direccionf->id_calle)
//                 ->first();
//             $coloniaf = DB::table('colonias')
//                 ->where('id', $callef->id_colonia)
//                 ->first();
//             $municipiof = DB::table('municipios')
//                 ->where('id', $coloniaf->id_municipio)
//                 ->first();
//             $estadof = DB::table('estados')
//                 ->where('id', $municipio->id_estado)
//                 ->first();
//         } else {
//             $direccionf = null;
//             $callef = null;
//             $coloniaf = null;
//             $municipiof = null;
//             $estadof = null;
//         }
//         return view('partials.login.editar_perfil', compact('sexos', 'roles', 'estados', 'usuario', 'direccion', 'calle', 'colonia', 'municipio', 'direccionf', 'callef', 'coloniaf', 'municipiof'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(registrou $req)
//     {
//         if (!session()->has('id_usuario')) {
//             return redirect(back());
//         }
//         $usuario = DB::table('usuarios')
//             ->where('id', session('id_usuario'))
//             ->first();
//         $direccionId = null;
//         $direccionIdf = null;
//         //actualizar direccion
//         if ($usuario->id_direccion_envios != null) {
//             $direccion = DB::table('direcciones')
//                 ->where('id', $usuario->id_direccion_envios)
//                 ->first();
//             $calle = DB::table('calles')
//                 ->where('id', $direccion->id_calle)
//                 ->first();
//             $colonia = DB::table('colonias')
//                 ->where('id', $calle->id_colonia)
//                 ->first();
//             $municipio = DB::table('municipios')
//                 ->where('id', $colonia->id_municipio)
//                 ->first();

//             DB::table('municipios')->where('id', $municipio->id)->update([
//                 'nombre' => $req->input('_mun'),
//                 'id_estado' => $req->input('_edo'),
//                 'updated_at' => now(),
//             ]);
//             DB::table('colonias')->where('id', $colonia->id)->update([
//                 'nombre' => $req->input('_col'),
//                 'CP' => $req->input('_cp'),
//                 'updated_at' => now(),
//             ]);
//             DB::table('calles')->where('id', $calle->id)->update([
//                 'nombre' => $req->input('_ca'),
//                 'updated_at' => now(),
//             ]);
//             DB::table('direcciones')->where('id', $direccion->id)->update([
//                 'num_ext' => $req->input('_ne'),
//                 'num_int' => $req->input('_ni'),
//                 'updated_at' => now(),
//             ]);

//             $direccionId = $direccion->id;
//         }
//         //crear insert si no existia previamente
//         else {
//             if ($req->filled('_mun')) {
//                 $municipioId = DB::table('municipios')->insertGetId([
//                     'nombre' => $req->input('_mun'),
//                     'id_estado' => $req->input('_edo'),
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//                 $coloniaId = DB::table('colonias')->insertGetId([
//                     'nombre' => $req->input('_col'),
//                     'id_municipio' => $municipioId,
//                     'CP' => $req->input('_cp'),
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//                 $calleId = DB::table('calles')->insertGetId([
//                     'nombre' => $req->input('_ca'),
//                     'id_colonia' => $coloniaId,
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//                 $direccionId = DB::table('direcciones')->insertGetId([
//                     'num_ext' => $req->input('_ne'),
//                     'num_int' => $req->input('_ni'),
//                     'id_calle' => $calleId,
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//             }
//         }
//         //actualizar direccion fiscal
//         if ($usuario->id_direccion_fiscal != null) {
//             $direccionf = DB::table('direcciones')
//                 ->where('id', $usuario->id_direccion_fiscal)
//                 ->first();
//             $callef = DB::table('calles')
//                 ->where('id', $direccionf->id_calle)
//                 ->first();
//             $coloniaf = DB::table('colonias')
//                 ->where('id', $callef->id_colonia)
//                 ->first();
//             $municipiof = DB::table('municipios')
//                 ->where('id', $coloniaf->id_municipio)
//                 ->first();

//             DB::table('municipios')->where('id', $municipiof->id)->update([
//                 'nombre' => $req->input('_mun_fiscal'),
//                 'id_estado' => $req->input('_edo_fiscal'),
//                 'updated_at' => now(),
//             ]);
//             DB::table('colonias')->where('id', $coloniaf->id)->update([
//                 'nombre' => $req->input('_col_fiscal'),
//                 'CP' => $req->input('_cp_fiscal'),
//                 'updated_at' => now(),
//             ]);
//             DB::table('calles')->where('id', $callef->id)->update([
//                 'nombre' => $req->input('_ca_fiscal'),
//                 'updated_at' => now(),
//             ]);
//             DB::table('direcciones')->where('id', $direccionf->id)->update([
//                 'num_ext' => $req->input('_ne_fiscal'),
//                 'num_int' => $req->input('_ni_fiscal'),
//                 'updated_at' => now(),
//             ]);

//             $direccionIdf = $direccionf->id;
//         }
//         //crear insert fiscal si no existe
//         else {
//             if ($req->filled('_mun_fiscal')) {
//                 $municipioIdf = DB::table('municipios')->insertGetId([
//                     'nombre' => $req->input('_mun_fiscal'),
//                     'id_estado' => $req->input('_edo_fiscal'),
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//                 $coloniaIdf = DB::table('colonias')->insertGetId([
//                     'nombre' => $req->input('_col_fiscal'),
//                     'id_municipio' => $municipioIdf,
//                     'CP' => $req->input('_cp_fiscal'),
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//                 $calleIdf = DB::table('calles')->insertGetId([
//                     'nombre' => $req->input('_ca_fiscal'),
//                     'id_colonia' => $coloniaIdf,
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//                 $direccionIdf = DB::table('direcciones')->insertGetId([
//                     'num_ext' => $req->input('_ne_fiscal'),
//                     'num_int' => $req->input('_ni_fiscal'),
//                     'id_calle' => $calleIdf,
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]);
//             }
//         }
//         DB::table('usuarios')->where('id', session('id_usuario'))->update([
//             'nombre_usuario' => $req->input('_nu'),
//             'correo' => $req->input('_email'),
//             'nombre' => $req->input('_nu'),
//             'apellido_paterno' => $req->input('_ap'),
//             'apellido_materno' => $req->input('_am'),
//             'fecha_nacimiento' => $req->input('_fn'),
//             'RFC' => $req->input('_rfc'),
//             'telefono' => $req->input('_tel'),
//             'id_sexo' => $req->input('_sx'),
//             'id_rol' =>  $req->input('_rol'),
//             'updated_at' => now(),
//         ]);

//         if (!is_null($direccionId)) {
//             DB::table('usuarios')->where('id', session('id_usuario'))->update([
//                 'id_direccion_envios' => $direccionId,
//                 'updated_at' => now(),
//             ]);
//         }

//         if (!is_null($direccionIdf)) {
//             DB::table('usuarios')->where('id', session('id_usuario'))->update([
//                 'id_direccion_fiscal' => $direccionIdf,
//                 'updated_at' => now(),
//             ]);
//         }

//         return redirect('/perfil')->with('Confirmacion_update', 'Se actualizaron correctamente los datos');
//     }

//     public function pchange(cambio_pd $req)
//     {
//         if (!session()->has('id_usuario')) {
//             return redirect(back());
//         }
//         $password = $req->input('_pda');
//         // Buscar el usuario en la base de datos
//         $usuario = DB::table('usuarios')
//             ->select('contraseña')
//             ->where('estatus', 1)
//             ->where('id', session('id_usuario'))
//             ->first();

//         if ($req->input('_pdn') != $req->input('_pdnc')) {
//             return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
//         }

//         // Verificar si el usuario existe
//         if (!$usuario) {
//             return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
//         } else {

//             // Verificar si la contraseña es correcta
//             if (!Hash::check($password, $usuario->contraseña)) {
//                 return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
//             }
//             DB::table('usuarios')->where('id', session('id_usuario'))->update([
//                 'contraseña' => Hash::make($req->input('_pdn')),
//                 'updated_at' => now(),
//             ]);

//             return redirect('/')->with('Confirmacion_cambio', "Cambio de contraseña exitoso ");
//         }

//         return redirect(back())->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy()
//     {
//         if (!session()->has('id_usuario')) {
//             return redirect(back());
//         }
//         DB::table('usuarios')->where('id', session('id_usuario'))->update([
//             'estatus' =>  0,
//             'updated_at' => now(),
//         ]);
//         Session::forget('usuario');
//         Session::forget('id_usuario');
//         return redirect('/')->with('Confirmacion_eliminacion', 'La cuenta fue eliminada correctamente');
//     }
// }
