@extends('layouts.app')

@section('titulo', 'Editar Estudiante')

@section('contenido')
<br>
<h3 class="text-center">Editar Información del Estudiante</h3>
<br>
<div class="col-md-6 offset-md-3">
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $estudiante->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $estudiante->direccion }}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $estudiante->telefono }}">
        </div>
        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <input type="text" name="curso" id="curso" class="form-control" value="{{ $estudiante->curso }}">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
            @if($estudiante->imagen)
                <img src="{{ asset('storage/' . $estudiante->imagen) }}" style="width: 100px; height: auto; margin-top: 10px;" alt="Imagen actual">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
    </form>
</div>
@endsection


