@extends('layouts.app')

@section('titulo', 'Detalles del Estudiante')

@section('contenido')
<br>
<h3 class="text-center">Detalles del Estudiante</h3>
<br>
<div class="col-md-6 offset-md-3">
    <div class="card" style="width: 100%;">
        @if($estudiante->imagen)
            <img src="{{ asset('storage/' . $estudiante->imagen) }}" class="card-img-top" alt="Imagen de {{ $estudiante->nombre }}" style="width: 50%; padding: 20px; margin: 0 auto; display: block;">
        @else
            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Imagen por defecto" style="width: 50%; padding: 20px; margin: 0 auto; display: block;">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $estudiante->nombre }}</h5>
            <p class="card-text">Dirección: {{ $estudiante->direccion }}</p>
            <p class="card-text">Teléfono: {{ $estudiante->telefono }}</p>
            <p class="card-text">Curso: {{ $estudiante->curso }}</p>
            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>

            <!-- Formulario para eliminar -->
            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?');">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection

