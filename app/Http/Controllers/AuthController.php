<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('login');
    }

    public function procesarLogin(Request $request)
    {

        $carreraExiste = DB::table('carreras')->where('id', 1)->exists();
        if (!$carreraExiste) {
            DB::table('carreras')->insert([
                'id' => 1,
                'nombre_carrera' => 'Ingenieria de Sistemas',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


        if ($request->accion == 'ingresar') {
            $request->validate([
                'email' => 'required|email',
                'matricula' => 'required'
            ]);

            $estudiante = DB::table('estudiantes')
                ->where('email', $request->email)
                ->where('matricula', $request->matricula)
                ->first();

            if (!$estudiante) {
                return redirect()->back()->with('error', 'Los datos no coinciden o la cuenta no existe.');
            }

            session([
                'estudiante_id' => $estudiante->id,
                'estudiante_nombre' => $estudiante->nombre,
                'estudiante_matricula' => $estudiante->matricula
            ]);

            return redirect()->route('foro.index');
        }

     
        if ($request->accion == 'registrar') {
            $request->validate([
                'nombre' => 'required',
                'email' => 'required|email',
                'matricula' => 'required'
            ]);

            $correoExiste = DB::table('estudiantes')->where('email', $request->email)->exists();
            if ($correoExiste) {
                return redirect()->back()->with('error', 'El correo ya esta registrado. Intenta iniciar sesion.');
            }

            $id = DB::table('estudiantes')->insertGetId([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'matricula' => $request->matricula,
                'carrera_id' => 1, 
                'created_at' => now(),
                'updated_at' => now()
            ]);

            session([
                'estudiante_id' => $id,
                'estudiante_nombre' => $request->nombre,
                'estudiante_matricula' => $request->matricula
            ]);

            return redirect()->route('foro.index');
        }
    }
}