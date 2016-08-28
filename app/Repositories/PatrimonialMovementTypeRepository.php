<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialMovementType;

class PatrimonialMovementTypeRepository
{
	
	private $patrimonial_movement_type;

	public function __construct(PatrimonialMovementType $patrimonial_movement_type)
	{
		$this->patrimonial_movement_type = $patrimonial_movement_type;
	}

	public function allPatrimonialMovementTypes()
	{
		return $this->patrimonial_movement_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialMovementTypeById($id)
    {
        return $this->patrimonial_movement_type->find($id);
    }

    public function storePatrimonialMovementType($input)
    {
        $patrimonial_movement_type = $this->patrimonial_movement_type->fill($input);
        $patrimonial_movement_type->save();
    }
}