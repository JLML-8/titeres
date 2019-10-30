@extends('template.main')

@section('content')
<h1>Voluntario registrado con ID: {{$voluntario->id}}</h1>
<table class="table table-striped table-dark">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$voluntario->id}}</td>
            <td>{{$voluntario->Foto}}</td>
            <td>{{$voluntario->Nombre}}</td>
            <td>{{$voluntario->Edad}}</td>
            <td>{{$voluntario->Celular}}</td>
            <td>{{$voluntario->Correo}}</td>
            <td> 
            <a href="{{route('voluntarios.edit', $voluntario->id)}}" class="btn btn-success">Editar</a>
                <form method="post" action="{{url('/voluntarios/'.$voluntario->id)  }}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" onclick="return confirm('¿Esta seguro de querer borrar el registro?');" class="btn btn-outline-danger">Borrar</button>
                
                </form>
            </td>

        </tr>
    </tbody>
</table>

<ul>
    @foreach($voluntario->horarios as $horario)
    <h3>Horario</h3>
    <li>Dia: {{$horario->dia}}</li>
    <li>Hora de Inicio: {{$horario->horaInicio}}</li>
    <li>Hora de Fin: {{$horario->horaFin}}</li>
    @endforeach
</ul>
@endsection