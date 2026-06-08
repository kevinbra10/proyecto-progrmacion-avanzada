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

        if ($request->accion == 'ingresar') {
            $request->validate([
                'nombre' => 'required'
            ]);

            $estudiante = DB::table('estudiantes')
                ->where('nombre', $request->nombre)
                ->first();

            if (!$estudiante) {
                return redirect()->back()->with('error', 'El nombre de usuario no existe en el sistema.');
            }


            session([
                'estudiante_id' => $estudiante->id,
                'estudiante_nombre' => $estudiante->nombre,
                'estudiante_carrera' => 'Ingenieria de Sistemas', 
                'estudiante_matricula' => $estudiante->matricula ?? '2026-SYS',
                'estudiante_semestre' => $estudiante->semestre ?? '5to Semestre'
            ]);

            return redirect()->route('foro.index');
        }

   
        if ($request->accion == 'registrar') {
            $request->validate([
                'nombre' => 'required',
                'carrera' => 'required',
                'semestre' => 'required'
            ]);

            $usuarioExiste = DB::table('estudiantes')->where('nombre', $request->nombre)->exists();
            if ($usuarioExiste) {
                return redirect()->back()->with('error', 'Ese nombre ya se encuentra registrado.');
            }

            $prefijo = ($request->carrera == 'Ingenieria de Sistemas') ? 'SYS' : 'U';
            $matriculaGenerada = '2026-' . $prefijo;
            $emailLimpio = strtolower(str_replace(' ', '', $request->nombre)) . '@usfa.edu.bo';

            $carreraExiste = DB::table('carreras')->where('id', 1)->exists();
            if (!$carreraExiste) {
                DB::table('carreras')->insert([
                    'id' => 1,
                    'nombre_carrera' => 'Ingenieria de Sistemas',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

  
            $id = DB::table('estudiantes')->insertGetId([
                'nombre' => $request->nombre,
                'email' => $emailLimpio,
                'matricula' => $matriculaGenerada,
                'semestre' => $request->semestre, 
                'carrera_id' => 1, 
                'created_at' => now(),
                'updated_at' => now()
            ]);

            session([
                'estudiante_id' => $id,
                'estudiante_nombre' => $request->nombre,
                'estudiante_carrera' => $request->carrera,
                'estudiante_matricula' => $matriculaGenerada,
                'estudiante_semestre' => $request->semestre
            ]);

            return redirect()->route('foro.index');
        }
    }
}