@extends('home')

@section('content')

	<div class="page-header text-primary">
      	<h4>
        	Administração - Membros > Situação - Motivos: Consulta
        	<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('member_status_reasons.create') !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('member_status_reasons.edit', ['id' => $member_status_reason->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          		<a href="{!! route('member_status_reasons') !!}" type="button" class="btn btn-xs btn-danger" rel="tooltip" title="Pesquisar"><i class="fa fa-trash-o"></i></a>
        	</div>
      	</h4>
      	<hr class="hr-primary" />
  	</div>

  	<div class="row">
    	<div class="col-sm-8">
      		<div class="table-responsive">
      			<table class="table table-bordered table-striped">
          			<thead>
           				<th class="text-center" colspan="2"><h3><b>{{ $member_status_reason->code }} - {{ $member_status_reason->description }}</b></h3></th>
          			</thead>
          			<tbody>
          				<tr>
           					<td class="text-right" width="25%">Código</td>
           					<td class="text-left">{{ $member_status_reason->code }}</td>
            			</tr>

        				<tr>
             				<td class="text-right">Descrição</td>
             				<td class="text-left">{{ $member_status_reason->description }}</td>
           				</tr>
          			</tbody>
        		</table>
      		</div>
    	</div>
    	<div class="col-sm-4">
    		@if(count($logs)>0)
         @include('revisionable.logs_register')
        @endif
    	</div>
    </div>
	    
@endsection
  