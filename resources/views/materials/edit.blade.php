@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Materiais: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('materials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('materials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($material, ['route' => ['materials.update', $material->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('materials.form')

	{!! Form::close() !!}
	    
@endsection