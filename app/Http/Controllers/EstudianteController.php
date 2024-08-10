<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importa Storage

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable|string|max:50',
            'telefono' => 'nullable|string|max:10',
            'curso' => 'nullable|string|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        }

        Estudiante::create(array_merge(
            $request->except('imagen'),
            ['imagen' => $imagenPath]
        ));

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado con éxito.');
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable|string|max:50',
            'telefono' => 'nullable|string|max:10',
            'curso' => 'nullable|string|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($estudiante->imagen) {
                Storage::disk('public')->delete($estudiante->imagen);
            }
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        } else {
            $imagenPath = $estudiante->imagen;
        }

        $estudiante->update(array_merge(
            $request->except('imagen'),
            ['imagen' => $imagenPath]
        ));

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado con éxito.');
    }

    public function destroy(Estudiante $estudiante)
    {
        if ($estudiante->imagen) {
            Storage::disk('public')->delete($estudiante->imagen);
        }
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado con éxito.');
    }
}
