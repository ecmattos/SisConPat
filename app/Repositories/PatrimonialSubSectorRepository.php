<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialSubSector;

class PatrimonialSubSectorRepository
{
	
	private $patrimonial_sub_sector;

	public function __construct(PatrimonialSubSector $patrimonial_sub_sector)
	{
		$this->patrimonial_sub_sector = $patrimonial_sub_sector;
	}

	public function allPatrimonialSubSectors()
	{
		return $this->patrimonial_sub_sector
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialSubSectorById($id)
    {
        return $this->patrimonial_sub_sector->find($id);
    }

    public function storePatrimonialSubSector($input)
    {
        $patrimonial_sub_sector = $this->patrimonial_sub_sector->fill($input);
        $patrimonial_sub_sector->save();
    }
}