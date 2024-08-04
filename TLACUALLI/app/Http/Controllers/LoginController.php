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
use App\Models\Publicaciones;

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
    public function publicaciones()
    {
        return $this->hasMany(Publicaciones::class, 'usuario_id'); // Asegúrate de que 'usuario_id' es la columna correcta en la tabla publicaciones
    }
    public function index()
    {
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
            return back()->with('Confirmacion_login', "Registro exitoso, bienvenido " . $usuario->nombre_usuario);
        } else {
            return back()->with('Error_login', "Usuario o contraseña erróneos");
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            //Invalida sesión
            $request->session()->invalidate();

            //Gerean un nuevo token para la proxima sesión
            $request->session()->regenerateToken();

            return redirect('/')->with('Confirmacion_logout', 'Haz cerrado sesión correctamente.');
        } else {
            return redirect('/');
        }
    }

    public function show()
    {
        if (Auth::check()) {
            //Otiene el ID del usuario autenticado
            $usuarioId = Auth::id();

            $direccion = Direcciones::getDireccionEnvio($usuarioId); //

            $direccionF = Direcciones::getDireccionFiscal($usuarioId);

            //Por medio del modelo trae lo relacionado
            $usuario = Usuarios::with(
                'sexos',
                'roles',
                'direccion.calle',
                'direccion.calle.colonia',
                'direccion.calle.colonia.municipio',
                'direccion.calle.colonia.municipio.estado',
                'direccionF.calle',
                'direccionF.calle.colonia',
                'direccionF.calle.colonia.municipio',
                'direccionF.calle.colonia.municipio.estado'
            )->find($usuarioId);

            return view('partials.login.perfil', compact('usuario', 'direccion', 'direccionF'));
        } else {
            return view('/');
        }
    }

    public function edit()
    {
        //Otiene el ID del usuario autenticado
        $usuarioId = Auth::id();

        $direccion = Direcciones::getDireccionEnvio($usuarioId); //

        $direccionF = Direcciones::getDireccionFiscal($usuarioId);

        //Por medio del modelo trae lo relacionado
        $usuario = Usuarios::with(
            'sexos',
            'roles',
            'direccion.calle',
            'direccion.calle.colonia',
            'direccion.calle.colonia.municipio',
            'direccion.calle.colonia.municipio.estado',
            'direccionF.calle',
            'direccionF.calle.colonia',
            'direccionF.calle.colonia.municipio',
            'direccionF.calle.colonia.municipio.estado'
        )->find($usuarioId);

        $estados = Estados::all();
        $roles = Roles::all();
        $sexos = Sexos::all();
        return view('partials.login.editar_perfil', compact('usuario', 'estados', 'roles', 'sexos', 'direccion', 'direccionF'));
    }

    public function update(registrou $req)
    {
        $usuario = DB::table('usuarios')
            ->where('id', Auth::user()->id)
            ->first();
        $direccionId = null;
        $direccionIdf = null;
        //actualizar direccion
        if ($usuario->id_direccion_envios != null) {
            $direccion = DB::table('direcciones')
                ->where('id', $usuario->id_direccion_envios)
                ->first();
            $calle = DB::table('calles')
                ->where('id', $direccion->id_calle)
                ->first();
            $colonia = DB::table('colonias')
                ->where('id', $calle->id_colonia)
                ->first();
            $municipio = DB::table('municipios')
                ->where('id', $colonia->id_municipio)
                ->first();

            DB::table('municipios')->where('id', $municipio->id)->update([
                'nombre' => $req->input('_mun'),
                'id_estado' => $req->input('_edo'),
                'updated_at' => now(),
            ]);
            DB::table('colonias')->where('id', $colonia->id)->update([
                'nombre' => $req->input('_col'),
                'CP' => $req->input('_cp'),
                'updated_at' => now(),
            ]);
            DB::table('calles')->where('id', $calle->id)->update([
                'nombre' => $req->input('_ca'),
                'updated_at' => now(),
            ]);
            DB::table('direcciones')->where('id', $direccion->id)->update([
                'num_ext' => $req->input('_ne'),
                'num_int' => $req->input('_ni'),
                'updated_at' => now(),
            ]);

            $direccionId = $direccion->id;
        }
        //crear insert si no existia previamente
        else {
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
            }
        }
        //actualizar direccion fiscal
        if ($usuario->id_direccion_fiscal != null) {
            $direccionf = DB::table('direcciones')
                ->where('id', $usuario->id_direccion_fiscal)
                ->first();
            $callef = DB::table('calles')
                ->where('id', $direccionf->id_calle)
                ->first();
            $coloniaf = DB::table('colonias')
                ->where('id', $callef->id_colonia)
                ->first();
            $municipiof = DB::table('municipios')
                ->where('id', $coloniaf->id_municipio)
                ->first();

            DB::table('municipios')->where('id', $municipiof->id)->update([
                'nombre' => $req->input('_mun_fiscal'),
                'id_estado' => $req->input('_edo_fiscal'),
                'updated_at' => now(),
            ]);
            DB::table('colonias')->where('id', $coloniaf->id)->update([
                'nombre' => $req->input('_col_fiscal'),
                'CP' => $req->input('_cp_fiscal'),
                'updated_at' => now(),
            ]);
            DB::table('calles')->where('id', $callef->id)->update([
                'nombre' => $req->input('_ca_fiscal'),
                'updated_at' => now(),
            ]);
            DB::table('direcciones')->where('id', $direccionf->id)->update([
                'num_ext' => $req->input('_ne_fiscal'),
                'num_int' => $req->input('_ni_fiscal'),
                'updated_at' => now(),
            ]);

            $direccionIdf = $direccionf->id;
        }
        //crear insert fiscal si no existe
        else {
            if ($req->filled('_mun_fiscal')) {
                $municipioIdf = DB::table('municipios')->insertGetId([
                    'nombre' => $req->input('_mun_fiscal'),
                    'id_estado' => $req->input('_edo_fiscal'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $coloniaIdf = DB::table('colonias')->insertGetId([
                    'nombre' => $req->input('_col_fiscal'),
                    'id_municipio' => $municipioIdf,
                    'CP' => $req->input('_cp_fiscal'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $calleIdf = DB::table('calles')->insertGetId([
                    'nombre' => $req->input('_ca_fiscal'),
                    'id_colonia' => $coloniaIdf,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $direccionIdf = DB::table('direcciones')->insertGetId([
                    'num_ext' => $req->input('_ne_fiscal'),
                    'num_int' => $req->input('_ni_fiscal'),
                    'id_calle' => $calleIdf,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        DB::table('usuarios')->where('id', Auth::user()->id)->update([
            'nombre_usuario' => $req->input('_nu'),
            'correo' => $req->input('_email'),
            'nombre' => $req->input('_nu'),
            'apellido_paterno' => $req->input('_ap'),
            'apellido_materno' => $req->input('_am'),
            'fecha_nacimiento' => $req->input('_fn'),
            'RFC' => $req->input('_rfc'),
            'telefono' => $req->input('_tel'),
            'id_sexo' => $req->input('_sx'),
            'id_rol' =>  $req->input('_rol'),
            'updated_at' => now(),
        ]);

        if (!is_null($direccionId)) {
            DB::table('usuarios')->where('id', Auth::user()->id)->update([
                'id_direccion_envios' => $direccionId,
                'updated_at' => now(),
            ]);
        }

        if (!is_null($direccionIdf)) {
            DB::table('usuarios')->where('id', Auth::user()->id)->update([
                'id_direccion_fiscal' => $direccionIdf,
                'updated_at' => now(),
            ]);
        }

        return redirect('/perfil')->with('Confirmacion_update', 'Se actualizaron correctamente los datos');
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
        } else {
            $direccionId = null;
        }
        if ($req->filled('_mun_fiscal')) {
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
        } else {
            $direccionId_fiscal = null;
        }
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
        $usuario = Usuarios::where('id', $id_usuario)->first();
        Auth::login($usuario);
        return redirect('/')->with('Confirmacion_registro', "Registro exitoso, bienvenido " . $usuario->nombre_usuario);
    }


    public function pchange(cambio_pd $req)
    {
        $password = $req->input('_pda');
        if ($req->input('_pdn') != $req->input('_pdnc')) {
            return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
        }
        // Verificar si la contraseña es correcta
        if (!Hash::check($password, Auth::user()->contraseña)) {
            return back()->with('Error_contraseña', "Credenciales erroneas o nuevas contraseñas no coinciden");
        }
        DB::table('usuarios')->where('id', Auth::user()->id)->update([
            'contraseña' => Hash::make($req->input('_pdn')),
            'updated_at' => now(),
        ]);

        $usuario = Usuarios::where('id', Auth::user()->id)->first();
        Auth::logout();
        //Invalida sesión
        $req->session()->invalidate();

        //Gerean un nuevo token para la proxima sesión
        $req->session()->regenerateToken();

        Auth::login($usuario);
        return redirect('/perfil')->with('Confirmacion_cambio', "Cambio de contraseña exitoso ");
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
        } else {
            return redirect('/');
        }
    }
}
