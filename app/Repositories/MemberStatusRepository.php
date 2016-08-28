<?php

namespace SisConPat\Repositories;

use SisConPat\MemberStatus;

class MemberStatusRepository
{
	
	private $member_status;

	public function __construct(MemberStatus $member_status)
	{
		$this->member_status = $member_status;
	}

	public function allMemberStatuses()
	{
		return $this->member_status
			->orderBy('description', 'asc')
			->get();
	}

	public function findMemberStatusById($id)
    {
        return $this->member_status->find($id);
    }

    public function storeMemberStatus($input)
    {
        $member_status = $this->member_status->fill($input);
        $member_status->save();
    }
}