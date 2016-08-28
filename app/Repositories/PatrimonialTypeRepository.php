<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialType;

class PatrimonialTypeRepository
{
	
	private $patrimonial_type;

	public function __construct(PatrimonialType $patrimonial_type)
	{
		$this->patrimonial_type = $patrimonial_type;
	}

	public function allPatrimonialTypes()
	{
		return $this->patrimonial_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialTypeById($id)
    {
        return $this->patrimonial_type->find($id);
    }

    public function storePatrimonialType($input)
    {
        $patrimonial_type = $this->patrimonial_type->fill($input);
        $patrimonial_type->save();
    }
}