@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Sub-setores de Patrimônios: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('patrimonial_sub_sectors.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('patrimonial_sub_sectors') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($patrimonial_sub_sector, ['route' => ['patrimonial_sub_sectors.update', $patrimonial_sub_sector->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_sub_sectors.form')

	{!! Form::close() !!}
	    
@endsection