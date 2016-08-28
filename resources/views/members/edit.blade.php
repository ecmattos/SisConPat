@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		<a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Associados"><i class="fa fa-users"></i></a>
	   		Associados: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
        		
	        </div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    <?php $form_method = "put"; ?>

	    @include('members.form')

	{!! Form::close() !!}
	    
@endsection