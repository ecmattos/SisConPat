@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Patrimônios: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'patrimonials.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.search_form')

	{!! Form::close() !!}

@endsection