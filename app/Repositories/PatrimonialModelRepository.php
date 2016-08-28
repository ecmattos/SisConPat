<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialModel;

class PatrimonialModelRepository
{
	
	private $patrimonial_model;

	public function __construct(PatrimonialModel $patrimonial_model)
	{
		$this->patrimonial_model = $patrimonial_model;
	}

	public function allPatrimonialModels()
	{
		return $this->patrimonial_model
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialModelById($id)
    {
        return $this->patrimonial_model->find($id);
    }

    public function storePatrimonialModel($input)
    {
        $patrimonial_model = $this->patrimonial_model->fill($input);
        $patrimonial_model->save();
    }
}