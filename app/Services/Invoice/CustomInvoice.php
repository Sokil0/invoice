<?php

namespace App\Services\Invoice;

use App\Models\Invoice;

class CustomInvoice implements InvoiceHandler
{

    public function create(array $data)
    {
        // need to move this logic to repository and here work only with logic about invoice
        Invoice::create([
            'user_id' => $data['user_id'],
            'service' => $data['service'],
            'price' => $data['price']
        ]);
    }
}
