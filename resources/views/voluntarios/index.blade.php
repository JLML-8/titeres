@extends('template.main')

@section('content')
<h1>Voluntarios registrados</h1>
<a href="{{route('voluntarios.create')}}" class="btn btn-info">Agregar Voluntario</a>
@if(!$voluntarios->isEmpty())
<br><br>

<div class="center-block"> {{$voluntarios->links() }}</div>

<table class="table table-striped table-dark">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($voluntarios as $voluntario)
        <tr>
            <td>{{$voluntario->id}}</td>
            
            <td>
            <img src="{{ asset('storage').'/'.$voluntario->Foto}}" alt="" width="100">
                </td>
            <td>{{$voluntario->Nombre}}</td>
            <td>{{$voluntario->Edad}}</td>
            <td>{{$voluntario->Celular}}</td>
            <td>{{$voluntario->Correo}}</td>
            <td> 
            <a href="{{route('voluntarios.edit', $voluntario->id)}}" class="btn btn-success">Editar</a>
                <form method="post" action="{{url('/voluntarios/'.$voluntario->id)  }}">
                {{csrf_field()}}
                @if(!Auth::guest())
                    @if( Auth::user()->id==1)
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Esta seguro de querer borrar el registro?');" class="btn btn-primary">Borrar</button>
                        <br>
                    @endif
                @endif
                <a href="{{route('voluntarios.show', $voluntario->id)}}" class="btn btn-success">Detalle</a>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
{{ $voluntarios->links() }}

@else
<br><br>
<div class="alert alert-warning" role="alert">
  Parece que aún no haz creado ningún voluntario. 
</div>
@endif
@endsection