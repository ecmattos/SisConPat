@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Regiões
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('regions.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
        	<hr class="hr-primary" />
      	</h4>
    </div>

    <div class="table-responsive">
		<table class="table table-bordered table-striped"> 
			<thead>
				<tr>
					<th width="1%" class="text-center">#</th>
					<th width="5%">Código</th>
					<th>Descrição</th>
					<th width="5%">Cidades</th>				
					<th width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($regions as $region)
			        <tr>
			        	<td><a href="{!! route('regions.edit', ['id' => $region->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a></td>
			        	<td><a href="{!! route('regions.show', ['id' => $region->id]) !!}">{{ $region->code }}</a></td>
			        	<td>{{ $region->description }}</td>
			        	<td class="text-center"><span class="badge">{{ $region->cities->count() }}</span></td>
			        	<td>
			        		<a href="javascript:;" onclick="onDestroy('{!! route('regions.destroy', [$region->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection