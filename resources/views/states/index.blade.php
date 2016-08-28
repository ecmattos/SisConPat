@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Estados
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('states.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<table class="table table-bordered table-striped">
	    <thead>
	        <th width="1%" class="text-center">#</th>
	        <th width="2%">UF</th>
	        <th>Descrição</th>
	        <th width="5%">Cidades</th>
	        <th width="1%" class="text-center">#</th>
	    </thead>
	    <tbody>
		    @foreach($states as $state)
		        <tr>
		            <td>
		                <a href="{!! route('states.edit', [$state->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('states.show', [$state->id]) !!}">{!! $state->code !!}</a></td>
		            <td>{!! $state->description !!}</td>
		            <td class="text-center"><span class="badge">{{ $state->cities->count() }}</span></td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('states.destroy', [$state->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection