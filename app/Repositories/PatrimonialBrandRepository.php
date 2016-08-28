<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialBrand;

class PatrimonialBrandRepository
{
	
	private $patrimonial_brand;

	public function __construct(PatrimonialBrand $patrimonial_brand)
	{
		$this->patrimonial_brand = $patrimonial_brand;
	}

	public function allPatrimonialBrands()
	{
		return $this->patrimonial_brand
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialBrandById($id)
    {
        return $this->patrimonial_brand->find($id);
    }

    public function storePatrimonialBrand($input)
    {
        $patrimonial_brand = $this->patrimonial_brand->fill($input);
        $patrimonial_brand->save();
    }
}