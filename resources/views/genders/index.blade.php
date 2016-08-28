@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Sexo
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<table class="table table-bordered table-striped">
	    <thead>
	        <th width="1%"><a href="{!! route('genders.create') !!}"><i class="fa fa-file-o"></i></a></th>
	        <th width="2%">Código</th>
	        <th>Descrição</th>
	        <th width="1%" class="text-center">#</th>
	    </thead>
	    <tbody>
		    @foreach($genders as $gender)
		        <tr>
		            <td>
		                <a href="{!! route('genders.edit', [$gender->id]) !!}"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('genders.show', [$gender->id]) !!}">{!! $gender->code !!}</a></td>
		            <td>{!! $gender->description !!}</td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('genders.destroy', [$gender->id]) !!}')" id="link_delete"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection