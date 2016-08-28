<?php

namespace SisConPat\Repositories;

use SisConPat\State;

class StateRepository
{
	
	private $state;

	public function __construct(State $state)
	{
		$this->state = $state;
	}

	public function allStates()
	{
		return $this->state
			->orderBy('description', 'asc')
			->get();
	}

	public function findStateById($id)
    {
        return $this->state->find($id);
    }

    public function storeState($input)
    {
        $state = $this->state->fill($input);
        $state->save();
    }
}