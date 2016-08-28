@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Finalidade: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_reasons') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'payment_reasons.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_reasons.form')

	{!! Form::close() !!}

@endsection
