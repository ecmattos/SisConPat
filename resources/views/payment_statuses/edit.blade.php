@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Situação: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_statuses.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('payment_statuses') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($payment_status, ['route' => ['payment_statuses.update', $payment_status->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_statuses.form')

	{!! Form::close() !!}
	    
@endsection