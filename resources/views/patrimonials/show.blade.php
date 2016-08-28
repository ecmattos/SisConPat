@extends('home')

@section('content')
  <div class="page-header text-primary">
   	<h4>
     	Patrimônios: Consulta
     	<div class="btn-group btn-group-sm pull-right">
     		<a href="{!! route('patrimonials.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Resultados"><i class="fa fa-bars"></i></a>
        <a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a> 
        <a href="{!! route('patrimonials.copy', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Copiar"><i class="fa fa-copy"></i></a>      
     		<a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Atividades"><i class="fa fa-eye"></i></a>
        <a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    	</div>
   	</h4>
   	<hr class="hr-primary" />
  </div>

  <div class="col-sm-6">
    @include('patrimonials.patrimonial')    
  </div>

  <div class="col-sm-6">
   @include('patrimonials.accounting')
  </div>

  <div class="col-sm-12">
    @include('patrimonials.movements')
    @include('patrimonials.materials')
    @include('patrimonials.services')
  </div>
    
@endsection
  