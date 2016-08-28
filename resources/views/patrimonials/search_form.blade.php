<div class="form-group">
	<label for="srch_patrimonial_code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_patrimonial_code', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_description') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_patrimonial_description', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_type_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tipo:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_type_id', $patrimonial_types, $value = null, ['id'=>'patrimonial_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_sub_type_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_sub_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sub-tipo:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_sub_type_id', $patrimonial_sub_types, $value = null, ['id'=>'patrimonial_sub_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_brand_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_brand_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Marca:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_brand_id', $patrimonial_brands, $value = null, ['id'=>'patrimonial_brands_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_model_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_model_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Modelo:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_model_id', $patrimonial_models, $value = null, ['id'=>'patrimonial_models_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_serial') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_serial" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nr série:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_patrimonial_serial', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_purchase_process') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_purchase_process" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Processo compra:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_patrimonial_purchase_process', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_provider_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_provider_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Fornecedor:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::select('srch_patrimonial_provider_id', $providers, $value = null, ['id'=>'providers_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_invoice') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_invoice" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nota fiscal:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_patrimonial_invoice', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_invoice_date_start') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_invoice_date_start" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Período compra ínicio:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_patrimonial_invoice_date_start', $value = null, ['id'=>'patrimonial_invoice_daterangerpicker_start', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_invoice_date_end') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_invoice_date_end" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Período compra fim:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_patrimonial_invoice_date_end', $value = null, ['id'=>'patrimonial_invoice_daterangerpicker_end', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_asset_accounting_account_id') ? 'has-error' : '' }}">
	<label for="srch_asset_accounting_account_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Conta contábil Ativo:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_asset_accounting_account_id', $accounting_accounts, $value = null, ['id'=>'asset_accounting_accounts_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_management_unit_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_sector_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_sector_id', $patrimonial_sectors, $value = null, ['id'=>'patrimonial_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_sub_sector_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_sub_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sub-setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_sub_sector_id', $patrimonial_sub_sectors, $value = null, ['id'=>'patrimonial_sub_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_status_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_status_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_status_id', $patrimonial_statuses, $value = null, ['id'=>'patrimonial_statuses_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_status_date_start') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_status_date_start" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Período situação ínicio:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_patrimonial_status_date_start', $value = null, ['id'=>'patrimonial_status_daterangerpicker_start', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_status_date_end') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_status_date_end" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Período situação fim:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_patrimonial_status_date_end', $value = null, ['id'=>'patrimonial_status_daterangerpicker_end', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_depreciation_date') ? 'has-error' : '' }}">
	<label for="srch_depreciation_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data limite Depreciação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_depreciation_date', $value = date('d/m/Y'), ['id'=>'depreciation_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
		<div class="form-group col-sm-4">
			<button type="submit" class="btn btn-success">Pesquisar <i class="fa fa-check"></i></button>
			<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>



@section('js_scripts')
	<script type="text/javascript">
	  	$("#asset_accounting_accounts_list, #patrimonial_types_list, #patrimonial_sub_types_list, #patrimonial_brands_list, #patrimonial_models_list, #providers_list, #management_units_list, #patrimonial_sectors_list, #patrimonial_sub_sectors_list, #patrimonial_statuses_list").select2();

	  	$(function()
	  	{
	  		$("#patrimonial_invoice_daterangerpicker_start").datepicker(
		  	{
		  		yearRange: '1960:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#patrimonial_invoice_daterangerpicker_end").datepicker("option", "minDate", selectedDate);
		  		}
		  	});

		  	$("#patrimonial_invoice_daterangerpicker_end").datepicker(
		  	{
		  		yearRange: '1960:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#patrimonial_invoice_daterangerpicker_start").datepicker("option", "maxDate", selectedDate);
		  		}
		  	});


		  	$("#patrimonial_status_daterangerpicker_start").datepicker(
		  	{
		  		yearRange: '1960:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#patrimonial_status_daterangerpicker_end").datepicker("option", "minDate", selectedDate);
		  		}
		  	});

		  	$("#patrimonial_status_daterangerpicker_end").datepicker(
		  	{
		  		yearRange: '1960:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#patrimonial_status_daterangerpicker_start").datepicker("option", "maxDate", selectedDate);
		  		}
		  	});

		  	$("#depreciation_datepicker").datepicker(
	  		{
		        yearRange: '1960:'+(new Date).getFullYear()
		    }
    	);
		});
	</script>
@endsection