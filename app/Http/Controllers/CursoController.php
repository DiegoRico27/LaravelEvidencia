<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->cupos = $request->cupos;
        $curso->sede = $request->sede;

        if ($request->hasFile('imagen')) {
            $curso->imagen = $request->file('imagen')->store('cursos', 'public');
        }

        $curso->save();
        return redirect()->route('cursos.index');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->cupos = $request->cupos;
        $curso->sede = $request->sede;

        if ($request->hasFile('imagen')) {
            if ($curso->imagen) {
                Storage::delete('public/' . $curso->imagen);
            }
            $curso->imagen = $request->file('imagen')->store('cursos', 'public');
        }

        $curso->save();
        return redirect()->route('cursos.index');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->imagen) {
            Storage::delete('public/' . $curso->imagen);
        }
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}
