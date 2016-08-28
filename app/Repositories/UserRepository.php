<?php

namespace SisConPat\Repositories;

use SisConPat\User;
use SisConPat\RoleUser;

class UserRepository
{	
	private $user;
    private $roleuser;

	public function __construct(User $user, RoleUser $roleuser)
	{
		$this->user = $user;
        $this->roleuser = $roleuser;
	}

	public function allUsers()
	{
		return $this->user
			->where('name', '<>', '')
            ->orderBy('name', 'asc')
            ->get();
	}

    public function allUsersByRole($id)
    {
        return $this->roleuser
            ->whereRoleId($id)
            ->get();
    }

	public function findUserById($id)
    {
        return $this->user->find($id);
    }

    public function lastUser()
    {
        return $this->user->orderBy('id', 'desc')->first();
    }

    public function storeUser($input)
    {
        $user = $this->user->fill($input);
        $user->save();
    }

    public function findUserByConfirmationCode($confirmation_code)
    {
        return $this->user
            ->where('confirmation_code', '=', $confirmation_code)
            ->get();
    }

    public function enableUserById($id)
    {
        return $this->user
            ->where('id', '=', $id)
            ->update(['user_status_id' => 3]);
    }

    public function disableUserById($id)
    {
        return $this->user
            ->where('id', '=', $id)
            ->update(['user_status_id' => 4]);
    }
}