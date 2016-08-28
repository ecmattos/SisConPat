@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Materiais: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('materials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'materials.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('materials.form')

	{!! Form::close() !!}

@endsection
