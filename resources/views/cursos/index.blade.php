@extends('layouts.app')

@section('titulo', 'Listado de Cursos')

@section('contenido')
<br>
<h3 class="text-center">Listado de Cursos</h3>
<br>
<a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Curso</a>
<div class="row">
    @foreach ($cursos as $curso)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" class="card-img-top" alt="Imagen del Curso {{ $curso->nombre }}" style="padding: 20px; display: block; margin: 0 auto;">
                @else
                    <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Imagen por defecto" style="padding: 20px; display: block; margin: 0 auto;">
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{ $curso->nombre }}</h4>
                    <p class="card-text">{{ $curso->descripcion }}</p>
                    <p class="card-text">Cupos: {{ $curso->cupos }}</p>
                    <p class="card-text">Sede: {{ $curso->sede }}</p>
                    <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-success">Ver Detalles</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection


