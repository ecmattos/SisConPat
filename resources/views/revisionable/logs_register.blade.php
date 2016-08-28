@foreach($logs as $log)
  @if($log->key == 'created_at' && !$log->oldValue())
    <div class="log log-sm log-success">
	    Registro incluído por {{ $log->userResponsible()->name }} {{ $log->created_at->diffForHumans() }}.
	  </div>
  @elseif($log->key == 'deleted_at' && $log->newValue() != '')
  	<div class="log log-sm log-danger">
	    Registro excluído por {{ $log->userResponsible()->name }} {{ $log->created_at->diffForHumans() }}.
	  </div>
  @elseif($log->key == 'deleted_at' && $log->oldValue() != '')
    <div class="log log-sm log-success">
      Registro recuperado por {{ $log->userResponsible()->name }} {{ $log->created_at->diffForHumans() }}.
    </div>
  @else
    <div class="log log-sm log-warning">
	    {{ $log->userResponsible()->name }} alterou {{ $log->fieldName() }} de {{ $log->oldValue() }} para {{ $log->newValue() }} {{ $log->created_at->diffForHumans() }}.
	</div>
  @endif
@endforeach