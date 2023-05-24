<?php

namespace App\Services\Payment;

interface PaymentClient
{
    /**
     * process of payment
     *
     * @return string
     */
    public function pay(): string;
}
