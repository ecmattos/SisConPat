@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Planos: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('plans.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('plans') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($plan, ['route' => ['plans.update', $plan->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('plans.form')

	{!! Form::close() !!}
	    
@endsection