<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::select('numero', [5,6,4,'hola'], null, ['class' => 'form-control']) !!}
</div>

<!-- Parrafo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('parrafo', 'Parrafo:') !!}
    {!! Form::textarea('parrafo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('triangles.index') !!}" class="btn btn-default">Cancel</a>
</div>
