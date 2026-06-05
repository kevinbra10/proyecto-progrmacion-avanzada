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
                'matricula' => 'required',
                'nota_materia_1' => 'required|numeric|min:0|max:100',
                'nota_materia_2' => 'required|numeric|min:0|max:100'
            ]);

            $correoExiste = DB::table('estudiantes')->where('email', $request->email)->exists();
            if ($correoExiste) {
                return redirect()->back()->with('error', 'El correo ya existe.');
            }

            // 1. Guardar el nuevo estudiante
            $estudianteId = DB::table('estudiantes')->insertGetId([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'matricula' => $request->matricula,
                'carrera_id' => 1, 
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // 2. Guardar la Primera Materia (ID 1)
            DB::table('estudiante_materia')->insert([
                'estudiante_id' => $estudianteId,
                'materia_id' => 1,
                'nota' => $request->nota_materia_1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // 3. Guardar la Segunda Materia (ID 2)
            DB::table('estudiante_materia')->insert([
                'estudiante_id' => $estudianteId,
                'materia_id' => 2,
                'nota' => $request->nota_materia_2,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            session([
                'estudiante_id' => $estudianteId,
                'estudiante_nombre' => $request->nombre,
                'estudiante_matricula' => $request->matricula
            ]);

            return redirect()->route('foro.index');
        }
    }
}