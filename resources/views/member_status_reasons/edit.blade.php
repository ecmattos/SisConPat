@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Membros > Situação - Motivos:: Alteração
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($member_status, ['route' => ['member_status_reasons.update', $member_status->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('member_status_reasons.form')

	{!! Form::close() !!}
	    
@endsection