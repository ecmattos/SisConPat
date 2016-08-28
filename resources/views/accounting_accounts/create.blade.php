@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Plano de Contas: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('accounting_accounts') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'accounting_accounts.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('accounting_accounts.form')

	{!! Form::close() !!}

@endsection
