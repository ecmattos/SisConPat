<?php

namespace SisConPat\Repositories;

use SisConPat\Material;

class MaterialRepository
{
	
	private $material;

	public function __construct(Material $material)
	{
		$this->material = $material;
	}

	public function allMaterials()
	{
		return $this->material
			->orderBy('description', 'asc')
			->get();
	}

	public function allMaterialsByMaterialUnitId($id)
	{
		return $this->material
			->whereMaterialUnitId($id)
			->get();
	}

	public function findMaterialById($id)
    {
        return $this->material->find($id);
    }

    public function storeMaterial($input)
    {
        $material = $this->material->fill($input);
        $material->save();
    }
}