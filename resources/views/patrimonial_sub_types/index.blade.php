@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Sub-tipos de Patrimônios
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{{ route('patrimonial_sub_types.create') }}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_patrimonial_sub_types" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
		        <th data-width="1%" class="text-center">
		        	<a href="{{ route('patrimonial_sub_types.create') }}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
		        </th>
		        <th data-sortable="true" data-width="2%">Código</th>
		        <th data-sortable="true">Descrição</th>
		        <th data-sortable="true" data-width="1%" class="text-center">#</th>
		    </thead>
		    <tbody>
			    @foreach($patrimonial_sub_types as $patrimonial_sub_type)
			        <tr>
			            <td>
			                <a href="{{ route('patrimonial_sub_types.edit', [$patrimonial_sub_type->id]) }}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td><a href="{{ route('patrimonial_sub_types.show', [$patrimonial_sub_type->id]) }}">{{ $patrimonial_sub_type->code }}</a></td>
			            <td>{{ $patrimonial_sub_type->description }}</td>
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{{ route('patrimonial_sub_types.destroy', [$patrimonial_sub_type->id]) }}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection