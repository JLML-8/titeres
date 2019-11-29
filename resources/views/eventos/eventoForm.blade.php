@extends('template.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="card-body">
                    @if(isset($evento))
                      {!! Form::model($evento, ['route' => ['evento.update', $evento->id], 'method' => 'PATCH']) !!}
                    @else
                      {!! Form::open(['route' => 'evento.store']) !!}
                    @endif
                      <div class="form-group">
                          {!! Form::label('nombre_evento', 'Nombre del Evento') !!}
                          {!! Form::text('nombre_evento', null, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('voluntario_id[]', 'Voluntarios') !!}
                          {!! Form::select('voluntario_id[]', $voluntarios, $seleccionados ?? null, ['class' => 'form-control', 'multiple']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('descripcion', 'Descripcion del evento') !!}
                          {!! Form::text('descripcion', null, ['class' => 'form-control']) !!} 
                      </div>
                      <div class="form-group">
                          {!! Form::checkbox('contacto', 1, null) !!}
                          {!! Form::label('contacto', 'Voluntario Contacto') !!}
                      </div>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection