@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Membros > Situação - Motivos:
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<table class="table table-bordered table-striped">
	    <thead>
	        <th width="1%"><a href="{!! route('member_status_reasons.create') !!}"><i class="fa fa-file-o"></i></a></th>
	        <th width="2%">Código</th>
	        <th>Descrição</th>
	        <th width="1%" class="text-center">#</th>
	    </thead>
	    <tbody>
		    @foreach($member_status_reasons as $member_status_reason)
		        <tr>
		            <td>
		                <a href="{!! route('member_status_reasons.edit', [$member_status_reason->id]) !!}"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('member_status_reasons.show', [$member_status_reason->id]) !!}">{!! $member_status_reason->code !!}</a></td>
		            <td>{!! $member_status_reason->description !!}</td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('member_status_reasons.destroy', [$member_status_reason->id]) !!}')" id="link_delete"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection