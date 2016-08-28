<?php

namespace SisConPat\Repositories;

use SisConPat\MaterialUnit;

class MaterialUnitRepository
{
	
	private $material_unit;

	public function __construct(MaterialUnit $material_unit)
	{
		$this->material_unit = $material_unit;
	}

	public function allMaterialUnits()
	{
		return $this->material_unit
			->orderBy('description', 'asc')
			->get();
	}

	public function findMaterialUnitById($id)
    {
        return $this->material_unit->find($id);
    }

    public function storeMaterialUnit($input)
    {
        $material_unit = $this->material_unit->fill($input);
        $material_unit->save();
    }
}