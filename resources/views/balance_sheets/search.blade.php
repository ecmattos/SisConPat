@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Balancetes: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'balance_sheets.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('balance_sheets.search_form')

	{!! Form::close() !!}

@endsection
