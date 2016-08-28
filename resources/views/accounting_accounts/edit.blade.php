@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Plano de Contas: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('accounting_accounts.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('accounting_accounts') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($accounting_account, ['route' => ['accounting_accounts.update', $accounting_account->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('accounting_accounts.form')

	{!! Form::close() !!}
	    
@endsection