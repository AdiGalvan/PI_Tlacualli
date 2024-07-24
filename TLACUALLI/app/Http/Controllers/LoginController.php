<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Estados;
use App\Models\Roles;
use App\Models\Sexos;
use App\Models\Direcciones;
use App\Models\Calles;
use App\Models\Colonias;
use App\Models\Municipios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\registro;
use App\Http\Requests\registrou;
use App\Http\Requests\cambio_pd;
use DB;
use Carbon\Carbon;


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
        if(Auth::check()) {
            Auth::logout();
            //Invalida sesión
            $request->session()->invalidate();

            //Gerean un nuevo token para la proxima sesión
            $request->session()->regenerateToken();
            
            return redirect('/')->with('Confirmacion_logout', 'Haz cerrado sesión correctamente.');
        }
        else {
            return redirect('/');
        }
    }

    public function show ()
    {
        if(Auth::check()) {
            //Otiene el ID del usuario autenticado
            $usuarioId = Auth::id();

            $direccion = Direcciones::getDireccionEnvio($usuarioId); //

            $direccionF = Direcciones::getDireccionFiscal($usuarioId);

            //Por medio del modelo trae lo relacionado
            $usuario = Usuarios::with(
                'sexos', 'roles', 
                'direccion.calle', 'direccion.calle.colonia', 'direccion.calle.colonia.municipio', 'direccion.calle.colonia.municipio.estado',
                'direccionF.calle', 'direccionF.calle.colonia', 'direccionF.calle.colonia.municipio', 'direccionF.calle.colonia.municipio.estado'
                )->find($usuarioId);

            return view('partials.login.perfil', compact('usuario', 'direccion', 'direccionF'));
        }
        else {
            return view('/');
        }
    }

    public function edit ()
    {
        //Otiene el ID del usuario autenticado
        $usuarioId = Auth::id();

        $direccion = Direcciones::getDireccionEnvio($usuarioId); //

        $direccionF = Direcciones::getDireccionFiscal($usuarioId);

        //Por medio del modelo trae lo relacionado
        $usuario = Usuarios::with(
            'sexos', 'roles', 
            'direccion.calle', 'direccion.calle.colonia', 'direccion.calle.colonia.municipio', 'direccion.calle.colonia.municipio.estado',
            'direccionF.calle', 'direccionF.calle.colonia', 'direccionF.calle.colonia.municipio', 'direccionF.calle.colonia.municipio.estado'
            )->find($usuarioId);

            $estados = Estados::all();
            $roles = Roles::all();
            $sexos = Sexos::all();
        return view('partials.login.editar_perfil', compact('usuario', 'estados', 'roles', 'sexos', 'direccion', 'direccionF' ));

    }

    public function update(Request $request)
    {
        //Otiene el ID del usuario autenticado
        $usuarioId = Auth::id();
        
        //Validación de información personal
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

        //Validación de dirección personal
        $validatorDirPer = $request->validate([
            '_ca'   => 'string',
            '_ni'   => 'string',
            '_cp'   => 'string',
            '_edo'  => 'integer|exists:estados,id',
            '_ne'   => 'string',
            '_col'   => 'string',
            '_mun'  => 'string',
        ]);

        //Validación de dirección fiscal
        $validatorDirFis = $request->validate([
            '_ca_fiscal'   => 'string',
            '_ni_fiscal'   => 'string',
            '_cp_fiscal'   => 'string',
            '_edo_fiscal'  => 'integer|exists:estados,id',
            '_ne_fiscal'   => 'string',
            '_col_fiscal'   => 'string',
            '_mun_fiscal'  => 'string',
        ]);
        
        $usuario = Usuarios::find($usuarioId);

        if($usuario)
        {
            //Update de información personal
            $usuario->nombre = $validatorPersonal['_nu'];
            $usuario->apellido_paterno = $validatorPersonal['_ap'];
            $usuario->fecha_nacimiento = $validatorPersonal['_fn'];
            $usuario->correo = $validatorPersonal['_email'];
            $usuario->telefono = $validatorPersonal['_tel'];
            $usuario->id_rol = $validatorPersonal['_rol'];
            $usuario->apellido_materno = $validatorPersonal['_am'];
            $usuario->id_sexo = $validatorPersonal['_sx'];
            $usuario->RFC = strtoupper($validatorPersonal['_rfc']);
            
            $estado = Estados::find($validatorDirPer['_edo']);

            //Update de información dirección personal
            $municipio = Municipios::firstOrCreate(
                [
                'nombre' => $validatorDirPer['_mun'],
                'id_estado' => $estado->id
                ]
            );

            $colonia = Colonias::firstOrCreate(
                [
                'nombre' => $validatorDirPer['_col'],
                'CP' => $validatorDirPer['_cp'],
                'id_municipio' => $municipio->id
                ]
            );

            $calles = Calles::firstOrCreate(
                [
                'nombre' => $validatorDirPer['_ca'],
                'id_colonia' => $colonia->id
                ]
            );
            
            $direcionPer = Direcciones::updateOrCreate(
                [
                'id' => $usuario->id_direccion_envios,
                'num_ext' => $validatorDirPer['_ne'],
                'num_int' => $validatorDirPer['_ni'],
                'id_calle' => $calles->id,
                ]
            );

            //Update de información dirección fiscal
            $estadoF = Estados::find($validatorDirFis['_edo_fiscal']);

            $municipioF = Municipios::firstOrCreate(
                [
                'nombre' => $validatorDirFis['_mun_fiscal'],
                'id_estado' => $estadoF->id
                ]
            );

            $coloniaF = Colonias::firstOrCreate(
                [
                'nombre' => $validatorDirFis['_col_fiscal'],
                'CP' => $validatorDirFis['_cp_fiscal'],
                'id_municipio' => $municipioF->id
                ]
            );

            $callesF = Calles::firstOrCreate(
                [
                'nombre' => $validatorDirFis['_ca_fiscal'],
                'id_colonia' => $coloniaF->id
                ]
            );
            
            $direcionFis = Direcciones::updateOrCreate(
                [
                'id' => $usuario->id_direccion_fiscal,
                'num_ext' => $validatorDirFis['_ne_fiscal'],
                'num_int' => $validatorDirFis['_ni_fiscal'],
                'id_calle' => $callesF->id,
                ]
            );

            $usuario->id_direccion_envios = $direcionPer->id;
            $usuario->id_direccion_fiscal = $direcionFis->id;
            $usuario->save();

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
     public function create(registro $req)
     {
         if (session()->has('id_usuario')) {
             return redirect('/');
         }
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
             $id_usuario = DB::table('usuarios')->insertGetId([
                 'nombre_usuario' => $req->input('_nu'),
                 'correo' => $req->input('_email'),
                 'contraseña' => Hash::make($req->input('_pd')),
                 'nombre' => $req->input('_nu'),
                 'apellido_paterno' => $req->input('_ap'),
                 'apellido_materno' => $req->input('_am'),
                 'id_direccion_envios' => $direccionId,
                 'fecha_nacimiento' => $req->input('_fn'),
                 'RFC' => $req->input('_rfc'),
                 'id_direccion_fiscal' => $direccionId_fiscal,
                 'telefono' => $req->input('_tel'),
                 'id_sexo' => $req->input('_sx'),
                 'id_rol' =>  $req->input('_rol'),
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);
         } else {
             $id_usuario = DB::table('usuarios')->insertGetId([
                 'nombre_usuario' => $req->input('_nu'),
                 'correo' => $req->input('_email'),
                 'contraseña' => Hash::make($req->input('_pd')),
                 'nombre' => $req->input('_nu'),
                 'apellido_paterno' => $req->input('_ap'),
                 'apellido_materno' => $req->input('_am'),
                 'fecha_nacimiento' => $req->input('_fn'),
                 'RFC' => $req->input('_rfc'),
                 'telefono' => $req->input('_tel'),
                 'id_sexo' => $req->input('_sx'),
                 'id_rol' =>  $req->input('_rol'),
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);
         }
         session(['usuario' => $req->input('_nu')]);
         session(['id_usuario' => $id_usuario]);
         return redirect('/')->with('Confirmacion_registro', "Registro exitoso, bienvenido " . session('usuario'));
     }


     public function pchange(Request $request)
     {
        if(Auth::check()){
            $usuarioId = Auth::id();
        }
        //  if (!session()->has('id_usuario')) {
        //      return redirect(back());
        //  }
        //  $password = $req->input('_pda');
        //  // Buscar el usuario en la base de datos
        //  $usuario = DB::table('usuarios')
        //      ->select('contraseña')
        //      ->where('estatus', 1)
        //      ->where('id', session('id_usuario'))
        //      ->first();

        //  if ($req->input('_pdn') != $req->input('_pdnc')) {
        //      return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
        //  }

        //  // Verificar si el usuario existe
        //  if (!$usuario) {
        //      return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
        //  } else {

        //      // Verificar si la contraseña es correcta
        //      if (!Hash::check($password, $usuario->contraseña)) {
        //          return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
        //      }
        //      DB::table('usuarios')->where('id', session('id_usuario'))->update([
        //          'contraseña' => Hash::make($req->input('_pdn')),
        //          'updated_at' => now(),
        //      ]);

        //      return redirect('/')->with('Confirmacion_cambio', "Cambio de contraseña exitoso ");
        //  }

        //  return redirect(back())->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
     }

//     /**
//      * Remove the specified resource from storage.
//      */
     public function destroy(Request $request)
     {
         if (Auth::check()) {
            $usuarioId = Auth::id();
            $usuario = Usuarios::find($usuarioId);
            $usuario->estatus = 0;
            $usuario->updated_at = Carbon::now()->toDateString();

            //Invalida sesión
            $request->session()->invalidate();
            $usuario->save();

            return redirect('/')->with('Confirmacion_eliminacion', 'La cuenta fue eliminada correctamente');
        }
        else {
            return redirect('/');            
        }
    }
}
