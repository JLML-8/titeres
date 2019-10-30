@extends('template.main')

@section('content')
<h1>Horarios registrados</h1>
<table class="table table-striped table-dark">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Dia</th>
            <th>Hora de Inicio</th>
            <th>Hora Fin</th>
            <th>Nombre del voluntario</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $horario)
        <tr>
            <td>{{$horario->id}}</td>
            <td>{{$horario->dia}}</td>
            <td>{{$horario->horaInicio}}</td>
            <td>{{$horario->horaFin}}</td>
            <td>{{$horario->voluntario->Nombre}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection