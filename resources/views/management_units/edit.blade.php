@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Unidade Gestoras: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('management_units.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('management_units') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($management_unit, ['route' => ['management_units.update', $management_unit->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('management_units.form')

	{!! Form::close() !!}
	    
@endsection