@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		<a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Associados"><i class="fa fa-sitemap"></i></a>
	   		Parceiros: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
        		<a href="{!! route('partners.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	        	<a href="{!! route('partners') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
	        </div>
      	</h4>
      	<hr class="hr-primary" />
    </div>

    <div class="col-lg-12">
	    <div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_partners" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">#</th>
						<th data-field="region_id" data-sortable="true">Região</th>
						<th data-field="city_id" data-sortable="true">Cidade/UF</th>
						<th data-field="partner_type_id" data-sortable="true">Tipo</th>
						<th data-field="name" data-sortable="true">Nome</th>
						<th data-field="address">Endereço</th>
						<th data-field="neighborhood">Bairro</th>	
						<th data-field="zip_code">CEP</th>
						<th data-field="email" data-sortable="true">E-mail</th>
						<th data-field="phone">Fone</th>	
						<th data-field="mobile">Celular</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
					@foreach($partners as $partner)
				        <tr>
				        	<td><a href="{!! route('partners.edit', ['id' => $partner->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a></td>
				        	<td>{{ $partner->city->region->description }}</td>
				        	<td>{{ $partner->city->description }}/{{ $partner->city->state->code }}</td>
				        	<td>{{ $partner->partner_type->description }}</td>
				        	<td><a href="{!! route('partners.show', ['id' => $partner->id]) !!}">{{ $partner->name }}</a></td></td>
				        	<td>{{ $partner->address }}</td>
				        	<td>{{ $partner->neighborhood }}</td>
				        	<td>{{ $partner->zip_code_mask }}</td>
				        	<td>{{ $partner->email }}</td>
				        	<td>{{ $partner->phone_mask }}</td>
				        	<td>{{ $partner->mobile_mask }}</td>
				        	<td>
				        		<a href="javascript:;" onclick="onDestroy('{!! route('partners.destroy', [$partner->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				       		</td>
				        </tr>
				    @endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_partners').bootstrapTable();
	</script>
@endsection