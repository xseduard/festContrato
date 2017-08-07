@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contrato
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('contratos.show_fields')
                    <a href="{!! route('contratos.index') !!}" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
