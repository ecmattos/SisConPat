@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Unidades de Materiais: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('material_units') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'material_units.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('material_units.form')

	{!! Form::close() !!}

@endsection
