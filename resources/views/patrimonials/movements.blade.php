<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>MOVIMENTAÇÕES</b>
		</h3>
			<span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
	</div>
	<div class="panel-body" style="display:none;">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_patrimonial_movements" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-width="1%" data-align="center">
							@if($patrimonial->patrimonial_status_id!=5)
					          	<a href="{!! route('patrimonial_movements.create', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Movimentação"><i class="fa fa-file-o"></i></a> 
				        	@endif
				        </th>
        				<th data-width="1%" data-align="right">Lanc</th>
						<th data-field="region_id">Filial</th>
						<th data-field="management_unit_id">Unid.Gestora</th>
						<th data-field="patrimonial_sector_id">Setor</th>
						<th data-field="patrimonial_sub_sector_id">Sub-setor</th>
						<th data-field="patrimonial_status_date">Data Situação</th>
						<th data-field="patrimonial_status_is">Situação</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonial_movements as $patrimonial_movement)
						<tr>
							<td></td>
							<td>{{ $patrimonial_movement->id }}</td>
							<td>{{ $patrimonial_movement->management_unit->region->description }}</td>
							<td><a href="{!! route('management_units.show', [$patrimonial->management_unit_id]) !!}">{{ $patrimonial->management_unit->code }}</a> - {{ $patrimonial_movement->management_unit->description }}</td>
							<td>{{ $patrimonial_movement->patrimonial_sector->description }}</td>
							<td>{{ $patrimonial_movement->patrimonial_sub_sector->description }}</td>
							<td>{{ $patrimonial_movement->patrimonial_status_date->format('d/m/Y') }}</td>
							<td>{{ $patrimonial_movement->patrimonial_status->description }}</td>
						</tr>
					@endforeach
				</tbody>
		</table>
		</div>
	</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
		$(document).on('click', '.panel-heading span.panel-clickable', function(e)
		{
    		var $this = $(this);
			if(!$this.hasClass('panel-collapsed')) 
				{
					$this.parents('.panel').find('.panel-body').slideUp();
					$this.addClass('panel-collapsed');
					$this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
				} 
			else 
				{
					$this.parents('.panel').find('.panel-body').slideDown();
					$this.removeClass('panel-collapsed');
					$this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
				}
		})
	</script>
@endsection