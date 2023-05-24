<?php

namespace App\Enum;

enum PaymentStatuses: string
{
    case SUCCESS = 'успешно';
    case NO_MONEY = 'недостаточно денег';
    case BANK_REFUSE = 'банк отклонил платеж';

    public static function randomValue(): string
    {
        $paymentStatuses = [
            self::SUCCESS,
            self::NO_MONEY,
            self::BANK_REFUSE
        ];
        $randKey = array_rand($paymentStatuses);

        return $paymentStatuses[$randKey]->value;
    }
}
