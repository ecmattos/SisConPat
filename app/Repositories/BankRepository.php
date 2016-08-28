<?php

namespace SisConPat\Repositories;

use SisConPat\Bank;

class BankRepository
{
	
	private $bank;

	public function __construct(Bank $bank)
	{
		$this->bank = $bank;
	}

	public function allBanks()
	{
		return $this->bank
			->orderBy('description', 'asc')
			->get();
	}

	public function findBankById($id)
    {
        return $this->bank->find($id);
    }

    public function storeBank($input)
    {
        $bank = $this->bank->fill($input);
        $bank->save();
    }
}