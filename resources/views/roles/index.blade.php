@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Grupos de Usuários
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('roles.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
      	</h4>
      	<hr class="hr-primary" />
    </div>

    <div class="col-lg-12">
	    <div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">#</th>
						<th data-field="roles" data-sortable="true">Grupos</th>
						<th data-field="users" data-sortable="false" data-width="5%">Usuários</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $role)
				        <tr>
				        	<td><a href="{!! route('roles.edit', ['id' => $role->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a></td>
				        	<td><a href="{!! route('roles.show', ['id' => $role->id]) !!}">{{ $role->role_title }}</a></td>
				        	<td class="text-center"><span class="badge">{{ $role->users->count() }}</span></td>
				        	<td>
				        		<a href="javascript:;" onclick="onDestroy('{!! route('roles.destroy', [$role->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
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
	  	$('#table_roles').bootstrapTable();
	</script>
@endsection