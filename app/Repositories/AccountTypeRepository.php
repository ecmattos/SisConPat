<?php

namespace SisConPat\Repositories;

use SisConPat\AccountType;

class AccountTypeRepository
{
	
	private $account_type;

	public function __construct(AccountType $account_type)
	{
		$this->account_type = $account_type;
	}

	public function allAccountTypes()
	{
		return $this->account_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findAccountTypeById($id)
    {
        return $this->account_type->find($id);
    }

    public function storeAccountType($input)
    {
        $account_type = $this->account_type->fill($input);
        $account_type->save();
    }
}