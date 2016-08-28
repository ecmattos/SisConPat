@extends('home')

@section('content')
	
	<div class="page-header text-primary">
		<h4>
	   		Administração - Usuário: Inclusão
	   		<hr class="hr-primary" />
	   	</h4>
	</div>


	{!! Form::open(['route' => 'users.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('users.form')

	{!! Form::close() !!}

@endsection