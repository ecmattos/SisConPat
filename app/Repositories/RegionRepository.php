<?php

namespace SisConPat\Repositories;

use SisConPat\Region;

class RegionRepository
{
	
	private $region;

	public function __construct(Region $region)
	{
		$this->region = $region;
	}

	public function allRegions()
	{
		return $this->region
			->orderBy('description', 'asc')
			->get();
	}

	public function findRegionById($id)
    {
        return $this->region->find($id);
    }

    public function storeRegion($input)
    {
        $region = $this->region->fill($input);
        $region->save();
    }
}