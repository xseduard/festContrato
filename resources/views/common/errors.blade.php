@if($errors->any())
	<div class="alert alert-danger alert-dismissable">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
    @foreach($errors->all() as $error)
			 <li>{!! $error !!}</li>
		@endforeach
    </div>
@endif
