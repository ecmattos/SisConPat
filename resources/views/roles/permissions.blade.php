{!! Form::open(['route' => ['role_permissions.store', $role->id], 'class'=>'form-vertical', 'role'=>'form']) !!}
    <div class="form-group">
		<label for="permission_id" class="control-label">Associar nova permissao:</label>
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<div class="input-group input-group-sm">
				<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
				{!! Form::select('permission_id', $role_permissions, null, ['id'=>'permissions_list', 'class'=>'form-control']) !!}
			</div>
		</div>

		<div class="form-group">
			<label for="submit" class="control-label"></label>
				<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1 pull-left">
					<button type="submit" class="btn btn-sm btn-success">Ok</button>
				</div>
		</div>
	</div>
{!! Form::close() !!}
