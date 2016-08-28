@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Metodo: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_methods.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('payment_methods') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($payment_method, ['route' => ['payment_methods.update', $payment_method->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_methods.form')

	{!! Form::close() !!}
	    
@endsection