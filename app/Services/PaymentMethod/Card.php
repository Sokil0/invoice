<?php

namespace App\Services\PaymentMethod;

use App\Models\Card as CardModel;

class Card implements PaymentMethod
{

    public function updateOrCreate(int $userId, array $data)
    {
        // need to move this logic to repository and here work only with logic about card
        CardModel::updateOrCreate(
            [
                'user_id' => $userId,
                'number' => $data['number']
            ],
            [
                'expired_date' => $data['expired_date'],
                'cvv' => $data['cvv'],
                'full_name' => $data['full_name']
            ]
        );
    }
}
