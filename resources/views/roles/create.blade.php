@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Grupos de Usuários: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('roles') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'roles.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('roles.form')

	{!! Form::close() !!}

@endsection
