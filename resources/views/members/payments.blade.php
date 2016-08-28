<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><b>PAGAMENTOS</b></h3>
			<span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_members" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-field="payment_date" data-sortable="true">Data</th>
						<th data-field="payment_reason_id" data-sortable="true">Finalidade</th>
						<th data-field="payment_method_id" data-sortable="true">Método</th>
						<th data-field="payment_value" data-sortable="true" data-align="right">R$</th>
					</tr>
				</thead>
				<tbody>
					@foreach($member->payments as $member->payment)
				        <tr>
				        	<td>{{ $member->payment->payment_date->format('d/m/Y') }}</td>
				        	<td>{{ $member->payment->payment_reason->description }}</td>
				        	<td>{{ $member->payment->payment_method->description }}</td>
				        	<td>{{ number_format(($member->payment->payment_value_01 + $member->payment->payment_value_02 + $member->payment->payment_value_03 + $member->payment->payment_value_04 + $member->payment->payment_value_05 + $member->payment->payment_value_06 + $member->payment->payment_value_07 + $member->payment->payment_value_08 + $member->payment->payment_value_09 + $member->payment->payment_value_10 + $member->payment->payment_value_11 + $member->payment->payment_value_12), 2,",",".") }}</td>
				        </tr>
				    @endforeach
				</tbody>

				<tfoot>
					<tr>
				        <td class="text-right" colspan="3"><b>Total</b></td>
				        <td class="text-right"><b>{{ number_format($member->getPaymentTotal(), 2,",",".") }}</b></td>
				    </tr>
				</tfoot>
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