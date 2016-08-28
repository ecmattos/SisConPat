@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		<a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Associados"><i class="fa fa-sitemap"></i></a>
	   		Parceiros: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('partners.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'partners.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('partners.search_form')

	{!! Form::close() !!}

@endsection