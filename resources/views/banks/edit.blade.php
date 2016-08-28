@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Banco: Alteração
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($bank, ['route' => ['banks.update', $bank->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('banks.form')

	{!! Form::close() !!}
	    
@endsection