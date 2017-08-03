@push('css-depLTE')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>

    <script>     
	    $(".select2").select2({
	      tags: false, // permite insertar texto
	      language: {noResults: function() {return "No se encontraron coincidencias";}, searching: function() {return "Buscando..";}
	            },
	      placeholder: 'Seleccionar...',      
	      allowClear: true
	    });
	    $('.datepicker').datepicker({             
	        format: 'yyyy-mm-dd',        
	        language: 'es',
	    });    
 	</script>
@endpush