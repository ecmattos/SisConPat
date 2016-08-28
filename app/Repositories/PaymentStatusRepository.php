<?php

namespace SisConPat\Repositories;

use SisConPat\PaymentStatus;

class PaymentStatusRepository
{
	
	private $payment_status;

	public function __construct(PaymentStatus $payment_status)
	{
		$this->payment_status = $payment_status;
	}

	public function allPaymentStatuses()
	{
		return $this->payment_status
			->orderBy('description', 'asc')
			->get();
	}

	public function findPaymentStatusById($id)
    {
        return $this->payment_status->find($id);
    }

    public function storePaymentStatus($input)
    {
        $payment_status = $this->payment_status->fill($input);
        $payment_status->save();
    }
}