@extends('template.main')

@section('content')
<h1>Horarios registrados</h1>
<a href="{{route('horario.create')}}" class="btn btn-info">Agregar horario</a>

<br><br>
@if(!$horarios->isEmpty())
<div class="center-block"> {{$horarios->links() }}</div>
<table class="table table-striped table-dark">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Dia</th>
            <th>Hora de Inicio</th>
            <th>Hora Fin</th>
            <th>Nombre del voluntario</th> 
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($horarios as $horario)
        <tr>
            <td>{{$horario->id}}</td>
            <td>{{$horario->dia}}</td>
            <td>{{$horario->horaInicio}}</td>
            <td>{{$horario->horaFin}}</td>
            <td>{{$horario->voluntario->Nombre}}</td>
            <td>
            <form method="post" action="{{url('/horario/'.$horario->id)  }}">
                {{csrf_field()}}
                @if(!Auth::guest())
                    @if( Auth::user()->id==1)
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Esta seguro de querer borrar el registro?');" class="btn btn-danger">Borrar</button>
                        <br>
                    @endif
                @endif
            </td>
             </form>
        </tr>
        @endforeach
    </tbody>
</table>
{{$horarios->links() }}
@else
<div class="alert alert-warning" role="alert">
    No se ha creado ningún horario
</div>
@endif
@endsection