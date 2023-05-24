<?php

namespace App\Services\Invoice;

interface InvoiceHandler
{
    /**
     * create invoice
     *
     * @param array $data
     */
    public function create(array $data);
}
