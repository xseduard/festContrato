@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Usuario <small><i class="fa fa-angle-right" aria-hidden="true"></i></small> Editar
        </h1>
   </section>
   <div class="content">
       <div class="animsition" data-animsition-in-class="zoom-in-sm" data-animsition-in-duration="1500" data-animsition-out-class="zoom-out-sm" data-animsition-out-duration="800">
          @include('common.errors')
       </div>
       <div class="animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
         <div class="box box-primary">
             <div class="box-body">
                 <div class="row">
                     {!! Form::model($user, ['route' => ['usuarios.update', $user->id], 'method' => 'patch']) !!}

                          @include('users.fields')

                     {!! Form::close() !!}
                 </div>
             </div>
         </div>
        </div>
   </div>
@endsection

@push('scripts')
  <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
  </script>
@endpush