<?php

namespace SisConPat\Repositories;

use SisConPat\Permission;

class PermissionRepository
{
	
	private $permission;

	public function __construct(Permission $permission)
	{
		$this->permission = $permission;
	}

	public function allPermissions()
	{
		return $this->permission
			->orderBy('permission_title', 'asc')
			->get();
	}

	public function findPermissionById($id)
    {
        return $this->permission->find($id);
    }

    public function storePermission($input)
    {
        $permission = $this->permission->fill($input);
        $permission->save();
    }
}