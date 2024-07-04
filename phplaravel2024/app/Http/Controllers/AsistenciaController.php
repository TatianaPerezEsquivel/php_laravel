<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

use App\Models\Estudiante;
use App\Models\Grupo; 


class AsistenciaController extends Controller
{
    public function index(Request $request)
    {
        $query = Asistencia::query();

        if ($request->has('estudiante_id') && is_numeric($request->estudiante_id)) {
            $query->where('estudiante_id', $request->estudiante_id);
        }
        if ($request->has('fecha')) {
            $query->where('fecha', 'like', '%' . $request->fecha . '%');
        }
        if ($request->has('hora_entrada')) {
            $query->where('hora_entrada', 'like', '%' . $request->hora_entrada . '%');
        }

        $asistencias = $query->with('estudiante', 'grupo')->orderBy('id', 'desc')->simplePaginate(10);

        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();

        return view('asistencias.index', compact('asistencias'  ,'estudiantes', 'grupos'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all(); 
        $grupos = Grupo::all();
        return view('asistencias.create', compact('estudiantes', 'grupos'));
    }

    public function store(Request $request)
    {
        Asistencia::create($request->all());
        return redirect()->route('asistencias.index')->with('success', 'Asistencia creada correctamente.');
    }

    public function show($id)
    {
        $asistencia = Asistencia::with('estudiante', 'grupo')->find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencias.show', compact('asistencia'));
    }

    public function edit($id)
    {
        $asistencia = Asistencia::with('estudiante', 'grupo')->find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $grupos = Grupo::all();
        $estudiantes = Estudiante::all();

        return view('asistencias.edit', compact('asistencia', 'grupos', 'estudiantes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiante,id',
            'grupo_id' => 'required|exists:grupo,id', // Asegúrate de que el nombre de la tabla sea correcto
            'fecha' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i',
        ]);

        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    public function delete($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencias.delete', compact('asistencia'));
    }

    public function destroy($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $asistencia->delete();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}