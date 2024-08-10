@extends('layouts.app')

@section('titulo', 'Crear Curso')

@section('contenido')
<br>
<h3 class="text-center">Crear Nuevo Curso</h3>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre del Curso:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="form-group">
                    <label for="cupos">Cupos:</label>
                    <input type="number" class="form-control" id="cupos" name="cupos" required>
                </div>
                <div class="form-group">
                    <label for="sede">Sede:</label>
                    <input type="text" class="form-control" id="sede" name="sede" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del Curso:</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                </div>
                <button type="submit" class="btn btn-primary">Crear Curso</button>
            </form>
        </div>
    </div>
</div>
@endsection
