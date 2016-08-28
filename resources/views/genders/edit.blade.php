@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Sexo: Alteração
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($gender, ['route' => ['genders.update', $gender->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('genders.form')

	{!! Form::close() !!}
	    
@endsection