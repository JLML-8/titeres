@extends('template.main')

@section('content')
<div class="container">
<h1>Información del Evento</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary mb-3">
            <h3>Evento: {{ $evento->nombre_evento }}</h3>
                <br>
                <div>
                <div>
                <div class="card-body">
                <h5 class="card-title">Descripción: {{$evento->descripcion }}</h5>
                <br>
                <h5>Voluntarios registrados:</h5>
                <ul>
                  
                  @foreach($evento->voluntarios as $voluntario)
                    <li>Nombre del voluntario:  {{ $voluntario->Nombre }} </li>
                    <li>Contacto:   {{ $voluntario->pivot->contacto }}</li>
                  @endforeach
                </ul>
              </div>  
              </div>   
            </div>
        </div>
    </div>
</div>
@include('archivos.archivoForm', ['modelo_id' => $evento->id, 'modelo_type' => 'App\Evento'])
                @include('archivos.archivoIndex', ['archivos' => $evento->archivos])
@endsection