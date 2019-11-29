
<div class="card text-white bg-primary mb-3">
    <div class="card-header text-info">Cargar Archivos</div>
    <div class="card-body">
        {!! Form::open(['route' => 'archivo.upload', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('archivo', 'Carga de Archivo') !!}
                {!! Form::file('archivo') !!}
            </div>
            {!! Form::hidden('modelo_id', $modelo_id) !!}
            {!! Form::hidden('modelo_type', $modelo_type) !!}
            <button type="submit" class="btn btn-success">Enviar</button>
        {!! Form::close() !!}
    </div>
</div>
