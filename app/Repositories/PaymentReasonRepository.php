<?php

namespace SisConPat\Repositories;

use SisConPat\PaymentReason;

class PaymentReasonRepository
{
	
	private $payment_reason;

	public function __construct(PaymentReason $payment_reason)
	{
		$this->payment_reason = $payment_reason;
	}

	public function allPaymentReasons()
	{
		return $this->payment_reason
			->orderBy('description', 'asc')
			->get();
	}

	public function findPaymentReasonById($id)
    {
        return $this->payment_reason->find($id);
    }

    public function storePaymentReason($input)
    {
        $payment_reason = $this->payment_reason->fill($input);
        $payment_reason->save();
    }
}