@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Patrimônios - Relatório de Aquisições
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'patrimonials_reports_purchases.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('reports.patrimonials.purchases.search_form')

	{!! Form::close() !!}

@endsection
