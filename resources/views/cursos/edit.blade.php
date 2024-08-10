@extends('layouts.app')

@section('titulo', 'Editar Curso')

@section('contenido')
<br>
<h3 class="text-center">Editar Curso</h3>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('cursos.update', $curso->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre del Curso:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $curso->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $curso->descripcion }}" required>
                </div>
                <div class="form-group">
                    <label for="cupos">Cupos:</label>
                    <input type="number" class="form-control" id="cupos" name="cupos" value="{{ $curso->cupos }}" required>
                </div>
                <div class="form-group">
                    <label for="sede">Sede:</label>
                    <input type="text" class="form-control" id="sede" name="sede" value="{{ $curso->sede }}" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del Curso:</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                    @if($curso->imagen)
                        <img src="{{ asset('storage/' . $curso->imagen) }}" alt="Imagen del Curso {{ $curso->nombre }}" style="width: 120px; margin-top: 10px;">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Curso</button>
            </form>
        </div>
    </div>
</div>
@endsection

