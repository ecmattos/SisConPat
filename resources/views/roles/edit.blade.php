@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Grupo de Usuário: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('roles') !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Incluir"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('roles.form')

	{!! Form::close() !!}
	    
@endsection