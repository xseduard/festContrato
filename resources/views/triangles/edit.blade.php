@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Triangle
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($triangle, ['route' => ['triangles.update', $triangle->id], 'method' => 'patch']) !!}

                        @include('triangles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection