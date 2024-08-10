@extends('layouts.app')

@section('titulo', 'Listado de Estudiantes')

@section('contenido')
<br>
<h3 class="text-center">Listado de Estudiantes Creados</h3>
<br>

<!-- Botón para crear un nuevo estudiante -->
<div class="mb-3">
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">Crear Nuevo Estudiante</a>
</div>

<div class="row">
    @foreach ($estudiantes as $estudiantico)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                @if($estudiantico->imagen)
                    <img src="{{ asset('storage/' . $estudiantico->imagen) }}" class="card-img-top img-card" alt="Imagen de {{ $estudiantico->nombre }}">
                @else
                    <img src="{{ asset('images/default.png') }}" class="card-img-top img-card" alt="Imagen por defecto">
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{ $estudiantico->nombre }}</h4>
                    <p class="card-text">Dir: <b>{{ $estudiantico->direccion }}</b></p>
                    <p class="card-text">Tel: {{ $estudiantico->telefono }}</p>
                    <p class="card-text">{{ $estudiantico->curso }}</p>
                    <a href="{{ route('estudiantes.show', $estudiantico->id) }}" class="btn btn-success">Ver Detalles</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection



