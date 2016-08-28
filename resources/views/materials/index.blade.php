@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Materiais
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('materials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_materials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">
							<a href="{!! route('materials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
						</th>
						<th data-width="5%" data-field="code" data-sortable="true">Código</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-width="5%" data-field="material_unit">Unidade</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($materials as $material)
				        <tr>
				            <td>
				                <a href="{!! route('materials.edit', [$material->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				            </td>
				            <td><a href="{!! route('materials.show', [$material->id]) !!}">{{ $material->code }}</a></td>
				            <td>{{ $material->description }}</td>
				            <td>{{ $material->material_unit->code }}</td>
				            <td>
				            	<a href="javascript:;" onclick="onDestroy('{!! route('materials.destroy', [$material->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection