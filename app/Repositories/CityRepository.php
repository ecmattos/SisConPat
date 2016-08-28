<?php

namespace SisConPat\Repositories;

use SisConPat\City;

class CityRepository
{
	
	private $city;

	public function __construct(City $city)
	{
		$this->city = $city;
	}

	public function allCities()
	{
		return $this->city
			->orderBy('description', 'asc')
			->get();
	}

	public function findCityById($id)
    {
        return $this->city->find($id);
    }

    public function storeCity($input)
    {
        $city = $this->city->fill($input);
        $city->save();
    }

    public function findCitiesByStateId($id)
    {
        return $this->city
            ->whereStateId($id)
            ->orderBy('description', 'asc')
            ->get();
    }
}