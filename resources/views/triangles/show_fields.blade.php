<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $triangle->id !!}</p>
</div>

<!-- Text Field -->
<div class="form-group">
    {!! Form::label('text', 'Text:') !!}
    <p>{!! $triangle->text !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Numero:') !!}
    <p>{!! $triangle->numero !!}</p>
</div>

<!-- Parrafo Field -->
<div class="form-group">
    {!! Form::label('parrafo', 'Parrafo:') !!}
    <p>{!! $triangle->parrafo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $triangle->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $triangle->updated_at !!}</p>
</div>

