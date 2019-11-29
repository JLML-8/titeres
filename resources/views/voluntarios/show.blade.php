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
                @if(!Auth::guest())
                    @if( Auth::user()->id==1 ?? 'aun no haz')
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Esta seguro de querer borrar el registro?');" class="btn btn-primary">Borrar</button>
                        <br>
                    @endif
                @endif
                </form>
            </td>
            

            
        </tr>
    </tbody>
</table>
            <ul>
            <h3>Horario</h3>
                @if(!$voluntario->horarios->isEmpty())
                @foreach($voluntario->horarios as $horario)
                
                <li>Dia: {{$horario->dia}}</li>
                <li>Hora de Inicio: {{$horario->horaInicio}}</li>
                <li>Hora de Fin: {{$horario->horaFin}}</li>
                @endforeach
                @else
                <div class="alert alert-warning" role="alert">
                No se ha añadido ningún horario para este voluntario.
                </div>
                @endif
            </ul>
            @if(!Auth::guest())
            @include('archivos.archivoForm', ['modelo_id' => $voluntario->id, 'modelo_type' => 'App\Voluntarios'])
            @include('archivos.archivoIndex', ['archivos' => $voluntario->archivos])
            @endif



@endsection