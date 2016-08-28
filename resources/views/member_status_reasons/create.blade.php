@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Membros > Situação - Motivos: Inclusão
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'member_status_reasons.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('member_status_reasons.form')

	{!! Form::close() !!}

@endsection
