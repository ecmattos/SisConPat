@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Estados: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
              	<a href="{!! route('states') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
          		<a href="{!! route('states.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          	</div>
          	<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('states.form')

	{!! Form::close() !!}
	    
@endsection