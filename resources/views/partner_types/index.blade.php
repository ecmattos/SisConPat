@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Parceiros > Tipos
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('partner_types.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
			<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<table class="table table-bordered table-striped">
	    <thead>
	        <th width="1%" class="text-center">#</th>
	        <th width="2%">Código</th>
	        <th>Descrição</th>
	        <th width="1%" class="text-center">#</th>
	    </thead>
	    <tbody>
		    @foreach($partner_types as $partner_type)
		        <tr>
		            <td>
		                <a href="{!! route('partner_types.edit', [$partner_type->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('partner_types.show', [$partner_type->id]) !!}">{!! $partner_type->code !!}</a></td>
		            <td>{!! $partner_type->description !!}</td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('partner_types.destroy', [$partner_type->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection