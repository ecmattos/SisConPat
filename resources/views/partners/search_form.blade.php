<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label for="name" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nome:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_partner_name', old('srch_partner_name'), ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="region_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Região:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_partner_region_id', $regions, old('srch_partner_region_id'), ['id'=>'regions_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="city_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_partner_city_id', $cities, old('srch_partner_city_id'), ['id'=>'cities_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="partner_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tipo:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_partner_type_id', $partner_types, old('srch_partner_type_id'), ['id'=>'partner_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-4 control-label"></label>
		<div class="form-group col-xs-10 col-sm-6">
			<button type="submit" class="btn btn-success">Pesquisar <i class="fa fa-check"></i></button>
			<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>



@section('js_scripts')
	<script type="text/javascript">
	  	$("#regions_list, #cities_list, #partner_types_list").select2();
	</script>
@endsection
