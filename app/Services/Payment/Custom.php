<?php

namespace App\Services\Payment;

use App\Enum\PaymentStatuses;

class Custom implements PaymentClient
{

    /**
     * @inheritDoc
     */
    public function pay(): string
    {
        return PaymentStatuses::randomValue();
    }
}
