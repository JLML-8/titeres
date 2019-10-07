@extends('template.main')

@section('content')
<h1>Voluntarios registrados</h1>
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
            <td>{{$voluntario->Foto}}</td>
            <td>{{$voluntario->Nombre}}</td>
            <td>{{$voluntario->Edad}}</td>
            <td>{{$voluntario->Celular}}</td>
            <td>{{$voluntario->Correo}}</td>
            <td> Editar |
                <form method="post" action="{{url('/voluntarios/'.$voluntario->id)  }}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" onclick="return confirm('¿Esta seguro de querer borrar el registro?');" class="btn btn-primary">Borrar</button>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection