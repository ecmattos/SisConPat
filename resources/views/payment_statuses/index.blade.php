@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Situação
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_statuses.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
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
		    @foreach($payment_statuses as $payment_status)
		        <tr>
		            <td>
		                <a href="{!! route('payment_statuses.edit', [$payment_status->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('payment_statuses.show', [$payment_status->id]) !!}">{!! $payment_status->code !!}</a></td>
		            <td>{!! $payment_status->description !!}</td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('payment_statuses.destroy', [$payment_status->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection