<?php

namespace SisConPat\Repositories;

use SisConPat\AccountCoverageType;

class AccountCoverageTypeRepository
{
	
	private $account_coverage_type;

	public function __construct(AccountCoverageType $account_coverage_type)
	{
		$this->account_coverage_type = $account_coverage_type;
	}

	public function allAccountCoverageTypes()
	{
		return $this->account_coverage_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findAccountCoverageTypeById($id)
    {
        return $this->account_coverage_type->find($id);
    }

    public function storeAccountCoverageType($input)
    {
        $account_coverage_type = $this->account_coverage_type->fill($input);
        $account_coverage_type->save();
    }
}