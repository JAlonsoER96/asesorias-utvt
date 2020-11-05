<br>
<div class="form-row align-items-center">
		<label class="control-label">Bucar </label>
		<input type="text" name="categoria" id="categoria">
		<!--<button class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i> </button>-->
</div>
<div class="col-lg-4 col-md-8 col-xs-8" id="resultado">
	
</div>
@push('script')
<script>
$(document).ready(function(){

	$('#categoria').keyup(function(){
		var par = $('#categoria').val();
		$('#resultado').load('{{ url('busquedaGrupo') }}' + '?categoria='+par);
	});

});
</script>
@endpush
