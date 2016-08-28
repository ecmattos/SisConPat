@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Pagamentos: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'payments.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('payments.search_form')

	{!! Form::close() !!}

@endsection