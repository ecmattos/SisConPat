<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialSector;

class PatrimonialSectorRepository
{
	
	private $patrimonial_sector;

	public function __construct(PatrimonialSector $patrimonial_sector)
	{
		$this->patrimonial_sector = $patrimonial_sector;
	}

	public function allPatrimonialSectors()
	{
		return $this->patrimonial_sector
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialSectorById($id)
    {
        return $this->patrimonial_sector->find($id);
    }

    public function storePatrimonialSector($input)
    {
        $patrimonial_sector = $this->patrimonial_sector->fill($input);
        $patrimonial_sector->save();
    }
}