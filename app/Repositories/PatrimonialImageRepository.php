<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialImage;

class PatrimonialImageRepository
{
	
	private $patrimonial_image;

	public function __construct(PatrimonialImage $patrimonial_image)
	{
		$this->patrimonial_image = $patrimonial_image;
	}

	public function allPatrimonialImages()
	{
		return $this->patrimonial_image
			->orderBy('description', 'asc')
			->get();
	}

	public function allPatrimonialImagesByPatrimonialId($id)
	{
		return $this->patrimonial_image
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialImageById($id)
    {
        return $this->patrimonial_image->find($id);
    }

    public function storePatrimonialImage($input)
    {
        $patrimonial_image = $this->patrimonial_image->fill($input);
        $patrimonial_image->save();
    }
}