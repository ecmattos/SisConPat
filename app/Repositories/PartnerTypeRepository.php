<?php

namespace SisConPat\Repositories;

use SisConPat\PartnerType;

class PartnerTypeRepository
{
	
	private $partner_type;

	public function __construct(PartnerType $partner_type)
	{
		$this->partner_type = $partner_type;
	}

	public function allPartnerTypes()
	{
		return $this->partner_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPartnerTypeById($id)
    {
        return $this->partner_type->find($id);
    }

    public function storePartnerType($input)
    {
        $partner_type = $this->partner_type->fill($input);
        $partner_type->save();
    }
}