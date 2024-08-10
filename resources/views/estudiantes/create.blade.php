@extends('layouts.app')

@section('titulo', 'Crear Estudiante')

@section('contenido')
<br>
<h3 class="text-center">Crear Nuevo Estudiante</h3>
<br>
<div class="col-md-6 offset-md-3">
    <form action="{{ route('estudiantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="mb-3">
            <label for="curso" class="form-label">Correo Electronico</label>
            <input type="text" name="curso" id="curso" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
    </form>
</div>
@endsection
