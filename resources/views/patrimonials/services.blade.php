<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>SERVIÇOS</b>
		</h3>
			<span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
	</div>
	<div class="panel-body" style="display:none;">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_patrimonial_services" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-width="1%" data-align="center">
						@if($patrimonial->patrimonial_status_id!=5)
				          	<a href="{!! route('patrimonial_services.create', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>  
			        	@endif
        				</th>
						<th data-width="1%" data-align="right">Lanc</th>
						<th data-width="1%" data-align="center">Tipo</th>
						<th data-width="1%" data-align="left" data-field="date">Data Interv</th>
						<th data-width="1%" data-align="right" data-field="code">Código</th>
						<th data-align="left" data-field="service_id">Descrição</th>
						<th data-width="10%" data-align="right" data-field="purchase_qty">Qte</th>
						<th data-width="12%" data-align="left" data-field="provider_id">Fornecedor</th>
						<th data-width="1%" data-align="right" data-field="invoice_date">Data Nota Fiscal</th>
						<th data-width="10%" data-align="right" data-field="invoice">Nota Fiscal</th>
						<th data-width="1%" data-align="right" data-field="purchase_value">Valor Compra</th>
						<th data-width="1%" data-align="center">#</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonial_services as $patrimonial_service)
						<tr>
							<td>
								@if($patrimonial->patrimonial_status_id!=5)
           							<a href="{!! route('patrimonial_services.edit', [$patrimonial_service->id]) !!}"type="button" class="round round-sm hollow blue" rel="tooltip" title="Alterar"><i class="fa fa-edit"></i></a>
          						@endif 
       						</td>
							<td>{{ $patrimonial_service->id }}</td>
							<td>{{ $patrimonial_service->patrimonial_intervention_type->code }}</td>
							<td>{{ $patrimonial_service->intervention_date->format('d/m/Y') }}</td>
							<td><a href="{!! route('services.show', [$patrimonial_service->service_id]) !!}">{{ $patrimonial_service->service->code }}</a></td>
							<td>{{ $patrimonial_service->service->description }}</td>
							<td>{{ number_format($patrimonial_service->purchase_qty, 2,",",".") }} {{ $patrimonial_service->service->unit }}</td>
							<td><a href="{!! route('providers.show', [$patrimonial_service->provider_id]) !!}">{{ $patrimonial_service->provider->cnpj_mask }}</a></td>
							<td>{{ $patrimonial_service->invoice_date->format('d/m/Y') }}</td>
							<td>{{ $patrimonial_service->invoice }}</td>
							<td>R$ {{ number_format($patrimonial_service->purchase_value, 2,",",".") }}</td>
							<td>
								@if($patrimonial->patrimonial_status_id!=5)
           							<a href="{!! route('patrimonial_services.edit', [$patrimonial_service->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
          						@endif 
							</td>
							
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th class="text-right" colspan="10">Total</th>
						<th class="text-right">R$ {{ number_format($total_services, 2,",",".") }}</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
		$(document).on('click', '.panel-heading span.clickable', function (e) 
		{
    		var $this = $(this);
    		if (!$this.hasClass('panel-collapsed')) 
    		{
    			console.log($this);
    			$this.parents('.panel').find('.panel-body').slideDown();
        		$this.addClass('panel-collapsed');
        		$this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');        		
    		} 
    		else 
    		{
    			console.log($this);
        		$this.parents('.panel').find('.panel-body').slideUp();
        		$this.removeClass('panel-collapsed');
        		$this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
    		}
		});
	</script>
@endsection