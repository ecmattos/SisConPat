@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Unidades Gestoras
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('management_units.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_management_units" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">
							<a href="{!! route('management_units.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
						</th>
						<th data-field="region_id" data-sortable="true">Filial</th>
						<th data-field="code" data-sortable="true">Código</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-field="address">Endereço</th>
						<th data-field="neighborhood">Bairro</th>
						<th data-field="city_id" data-sortable="true">Cidade/UF</th>
						<th data-field="zip_code">CEP</th>
						<th data-field="phone">Fone</th>
						<th data-field="mobile">Celular</th>
						<th data-field="email" data-sortable="true">E-mail</th>
						<th data-field="comments">Obs</th>		
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($management_units as $management_unit)
				        <tr>
				            <td>
				                <a href="{!! route('management_units.edit', [$management_unit->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				            </td>
				            <td>{{ $management_unit->region->description }}</td>
				            <td><a href="{!! route('management_units.show', [$management_unit->id]) !!}">{{ $management_unit->code }}</a></td>
				            <td>{{ $management_unit->description }}</td>
				            <td>{{ $management_unit->address }}</td>
				            <td>{{ $management_unit->neighborhood }}</td>
				            <td>{{ $management_unit->city->description }}/{{ $management_unit->city->state->code }}</td>
				            <td>{{ $management_unit->zip_code_mask }}</td>
				            <td>{{ $management_unit->phone_mask }}</td>
						    <td>{{ $management_unit->mobile_mask }}</td>
						    <td>{{ $management_unit->email }}</td>
						    <td>{{ $management_unit->comments }}</td>
				            <td>
				            	<a href="javascript:;" onclick="onDestroy('{!! route('management_units.destroy', [$management_unit->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection