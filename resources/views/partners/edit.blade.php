@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		<a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Associados"><i class="fa fa-sitemap"></i></a>
	   		Parceiro: Alteração
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($partner, ['route' => ['partners.update', $partner->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('partners.form')

	{!! Form::close() !!}
	    
@endsection