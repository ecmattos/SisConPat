@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Metodo: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_methods') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'payment_methods.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_methods.form')

	{!! Form::close() !!}

@endsection
