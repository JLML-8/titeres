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
<form action="{{url('/voluntarios')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<label for="Nombre" size="20">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="">
<br>
<label for="Edad" size="20">{{'Edad'}}</label>
<input type="text" name="Edad" id="Edad" value="">
<br>
<label for="Correo">{{'Correo'}}</label>
<input type="email" name="Correo" id="Correo" value="">
<br>
<label for="Celular">{{'Celular'}}</label>
<input type="text" name="Celular" id="Celular" value="">
<br>
<label for="Foto">{{'Foto'}}</label>
<input type="file" name="Foto" id="Foto" value="">
<br>
<input type="submit" value="Agregar">
<button type="button" class="btn btn-link">Link</button>
</form>
@endsection