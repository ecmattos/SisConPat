<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialSubType;

class PatrimonialSubTypeRepository
{
	
	private $patrimonial_sub_type;

	public function __construct(PatrimonialSubType $patrimonial_sub_type)
	{
		$this->patrimonial_sub_type = $patrimonial_sub_type;
	}

	public function allPatrimonialSubTypes()
	{
		return $this->patrimonial_sub_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialSubTypeById($id)
    {
        return $this->patrimonial_sub_type->find($id);
    }

    public function storePatrimonialSubType($input)
    {
        $patrimonial_sub_type = $this->patrimonial_sub_type->fill($input);
        $patrimonial_sub_type->save();
    }
}