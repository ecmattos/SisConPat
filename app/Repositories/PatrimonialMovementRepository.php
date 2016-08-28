<?php

namespace SisConPat\Repositories;

use SisConPat\PatrimonialMovement;

class PatrimonialMovementRepository
{
	
	private $patrimonial_movement;

	public function __construct(PatrimonialMovement $patrimonial_movement)
	{
		$this->patrimonial_movement = $patrimonial_movement;
	}

	public function allPatrimonialMovements()
	{
		return $this->patrimonial_movement
			->orderBy('description', 'asc')
			->get();
	}

	public function allPatrimonialMovementsByManagementId($id)
	{
		return $this->patrimonial_movement
			->whereManagementUnitId($id)
			->get();
	}

	public function findPatrimonialMovementById($id)
    {
        return $this->patrimonial_movement->find($id);
    }

    public function allPatrimonialMovementsByPatrimonialId($id)
    {
        return $this->patrimonial_movement
			->wherePatrimonialId($id)
			->orderBy('patrimonial_status_date', 'DESC')
			->get();
    }

    public function lastPatrimonialMovementDateByPatrimonialId($id)
    {
        return $this->patrimonial_movement
			->wherePatrimonialId($id)
			->orderBy('patrimonial_status_date', 'DESC')
			->take(1)
			->get();
    }

     public function findPatrimonialMovementByVariousParams1($patrimonial_id, $patrimonial_status_id, $patrimonial_status_date, $management_unit_id, $patrimonial_sector_id, $patrimonial_sub_sector_id)
    {
        return $this->patrimonial_movement
			->wherePatrimonialId($patrimonial_id)
			->wherePatrimonialStatusId($patrimonial_status_id)
			->wherePatrimonialStatusDate($patrimonial_status_date)
			->whereManagementUnitId($management_unit_id)
			->wherePatrimonialSectorId($patrimonial_sector_id)
			->wherePatrimonialSubSectorId($patrimonial_sub_sector_id)
			->take(1)
			->get();
    }


    public function storePatrimonialMovement($input)
    {
        $patrimonial_movement = $this->patrimonial_movement->fill($input);
        $patrimonial_movement->save();
    }
}