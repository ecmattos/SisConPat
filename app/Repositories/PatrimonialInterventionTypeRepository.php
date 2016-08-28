<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialInterventionType;

class PatrimonialInterventionTypeRepository
{
	
	private $patrimonial_intervention_type_model;

	public function __construct(PatrimonialInterventionType $patrimonial_intervention_type_model)
	{
		$this->patrimonial_intervention_type_model = $patrimonial_intervention_type_model;
	}

	public function allPatrimonialInterventionTypes()
	{
		return $this->patrimonial_intervention_type_model
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialInterventionTypeById($id)
    {
        return $this->patrimonial_intervention_type_model->find($id);
    }

    public function storePatrimonialInterventionType($input)
    {
        $patrimonial_intervention_type_model = $this->patrimonial_intervention_type_model->fill($input);
        $patrimonial_intervention_type_model->save();
    }
}