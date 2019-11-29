@extends('template.main')

@section('content')
<h1>Eventos registrados</h1>
<a href="{{route('evento.create')}}" class="btn btn-info">Crear evento</a>
@if(!$eventos->isEmpty())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            {{ $eventos->links() }}
                <div class="card-body">
                <table class="table table-striped table-dark">
                  <tr>
                    <th>Evento</th>
                    <th>Voluntarios</th>
                    <th>ID</th>
                    <th>Acciones</th>
                  </tr>
                  @foreach($eventos as $evento)
                    <tr>
                      <td>{{ $evento->nombre_evento }}</td>
                      <td>
                        <ul>
                        @foreach($evento->voluntarios as $voluntario)
                          <li>{{ $voluntario->nombre }}</li>
                          <br>
                        @endforeach
                        </ul>
                      </td>
                      <td>{{ $evento->id }}</td>
                    
                    <td> 
                    <a href="{{route('evento.edit', $evento->id)}}" class="btn btn-success">Editar</a><br><br>
                        <form method="post" action="{{url('/evento/'.$evento->id)  }}">
                        {{csrf_field()}}
                        @if(!Auth::guest())
                          @if( Auth::user()->id==1)
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Esta seguro de querer borrar el evento?');" class="btn btn-danger">Borrar</button>
                        <br>
                        <br>
                        @endif
                        @endif
                        

                        <a href="{{route('evento.show', $evento->id)}}" class="btn btn-info">Detalle</a>
                        </form>
                        <br>
                  </td>
                  </tr>
                  @endforeach
                </table>
                </div>
                {{ $eventos->links() }}
            </div>
        </div>
    </div>
</div>
@else
<br><br>
<div class="alert alert-warning" role="alert">
  No se han creado eventos aún. 
</div>
@endif
@endsection