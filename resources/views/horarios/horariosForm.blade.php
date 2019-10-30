@extends('template.main')
<style>
fieldset{
border:none;
width:500px;
margin:0px auto;
}
label{
display:inline-block;
width:200px;
margin-right:30px;
text-align:right;
}
</style>
@section('content')
<br><br><br>

<h3>Registrarse como voluntario</h3>
<br><br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($horario))
<!--<form action="{{route('horario.update', $voluntario->id)}}" method="post" enctype="multipart/form-data">-->
{!! Form::Model($horario, ['route' => ['horario.update', $horario->id], 'method' => 'PATCH'])!!}
@else
{!! Form::open(['route' => 'horario.store'])!!}
@endif
{{ csrf_field() }}
<!--<label for="Nombre" size="20">{{'Nombre'}}</label>-->
<!--<input type="text" name="Nombre" value="{{ $voluntario->Nombre ?? ''}}" id="Nombre" value="">-->
<br>
{!! Form::label('dia','Día') !!}
{!! Form::text('dia', null) !!}
<br>
<label for="horaInicio" size="20">{{'Hora Inicio'}}</label>
<!--<input type="text" name="Edad"  value="{{ $voluntario->Edad ?? ''}}" id="Edad" value="">-->
{!! Form::text('horaInicio', null) !!}
<br>
{!! Form::label('horaFIn','Hora de fin') !!}
{!! Form::text('horaFin', null) !!}
<br>
{!! Form::label('id','ID') !!}
{!! Form::select('voluntario_id', $voluntarios, null, ['class' => 'form-control']) !!}
<br>
<input type="submit" value="Agregar">
<button type="button" class="btn btn-link">Link</button>
</form>
@endsection