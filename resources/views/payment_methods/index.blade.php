@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Metodos
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_methods.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
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
		    @foreach($payment_methods as $payment_method)
		        <tr>
		            <td>
		                <a href="{!! route('payment_methods.edit', [$payment_method->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('payment_methods.show', [$payment_method->id]) !!}">{!! $payment_method->code !!}</a></td>
		            <td>{!! $payment_method->description !!}</td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('payment_methods.destroy', [$payment_method->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection