<?php

namespace App\Services;

use App\Services\Invoice\InvoiceHandler;
use App\Services\Payment\PaymentClient;
use App\Services\PaymentMethod\PaymentMethod;
use Illuminate\Support\Facades\DB;

class HandleClientInvoice
{
    public function __construct(
        private readonly InvoiceHandler $invoiceHandler,
        private readonly PaymentMethod $paymentMethod,
        private readonly PaymentClient $paymentClient
    ) {
    }

    public function paymentInvoice(array $data): string
    {
        return DB::transaction(function () use ($data) {
            $this->invoiceHandler->create([
                'user_id' => $data['user']['id'],
                'service' => $data['service'],
                'price' => $data['price']
            ]);
            $this->paymentMethod->updateOrCreate($data['user']['id'], $data['card']);
            
            return $this->paymentClient->pay();
        });
    }
}
