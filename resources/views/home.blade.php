@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	   <div class="col-sm-12">
	   		<div class="panel panel-info" style="margin-top: 30px">
				<div class="clearfix"></div>
			    <div class="animsition" data-animsition-in-class="zoom-in-sm" data-animsition-in-duration="1500" data-animsition-out-class="zoom-out-sm" data-animsition-out-duration="800">
			        @include('common.errors')
			        @include('flash::message')
			    </div>
	   			<div class="panel-body">
	   				Bienvenido a FestContrato
	   			</div>
	   		</div>
	   </div>
    </div>
</div>
@endsection
