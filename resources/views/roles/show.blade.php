@extends('home')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Grupos de Usuários
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('roles') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="well well-sm text-center">
		<h4>{{ $role->role_title }}</h4>
	</div>

	<div class="col-sm-3">

		@include ('roles.users')

		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-field="users" data-sortable="true">Usuários</th>
						<th data-field="roles" data-sortable="false" data-width="5%">Grupos</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($role->users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td class="text-center"><span class="badge">{{ $user->roles->count() }}</span></td>
							<td>
								<a href="javascript:;" onclick="onDestroy('{!! route('role_users.destroy', [$user->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-sm-9">

		@include ('roles.permissions')

		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-field="roles" data-sortable="true">Permissões</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($role->permissions as $permission)
						<tr>
							<td>{{ $permission->permission_title }}</td>
							<td>
								<a href="javascript:;" onclick="onDestroy('{!! route('role_permissions.destroy', [$permission->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
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
	  	$("#permissions_list, #users_list").select2();
	</script>
@endsection
