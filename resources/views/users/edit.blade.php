@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Usuário: Alteração
          	<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('users.form')

	{!! Form::close() !!}
	    
@endsection