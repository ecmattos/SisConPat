<?php

namespace SisConPat\Repositories;

use SisConPat\Plan;

class PlanRepository
{
	
	private $plan;

	public function __construct(Plan $plan)
	{
		$this->plan = $plan;
	}

	public function allPlans()
	{
		return $this->plan
			->orderBy('description', 'asc')
			->get();
	}

	public function findPlanById($id)
    {
        return $this->plan->find($id);
    }

    public function storePlan($input)
    {
        $plan = $this->plan->fill($input);
        $plan->save();
    }
}