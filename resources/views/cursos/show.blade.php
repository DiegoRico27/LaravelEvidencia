@extends('layouts.app')

@section('titulo', 'Detalles del Curso')

@section('contenido')
<br>
<h3 class="text-center">Detalles del Curso</h3>
<br>
<div class="col-md-6 offset-md-3">
    <div class="card" style="width: 100%;">
        @if($curso->imagen)
            <img src="{{ asset('storage/' . $curso->imagen) }}" class="card-img-top" alt="Imagen del Curso {{ $curso->nombre }}" style="width: 300px; height: auto; padding: 20px; display: block; margin: 0 auto;">
        @else
            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Imagen por defecto" style="width: 300px; height: auto; padding: 20px; display: block; margin: 0 auto;">
        @endif
        <div class="card-body text-center">
            <h5 class="card-title">{{ $curso->nombre }}</h5>
            <p class="card-text">{{ $curso->descripcion }}</p>
            <p class="card-text">Cupos: {{ $curso->cupos }}</p>
            <p class="card-text">Sede: {{ $curso->sede }}</p>
            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection

