<?php

namespace App\Services\PaymentMethod;

interface PaymentMethod
{
    public function updateOrCreate(int $userId, array $data);
}
