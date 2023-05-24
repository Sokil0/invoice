<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\User;
use App\Services\HandleClientInvoice;
use Exception;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    public function __construct(
        private readonly HandleClientInvoice $handleClientInvoice
    ) {
    }

    public function show()
    {
        return Inertia::render('Invoice/Create', [
            'user' => User::all()->random()->only(['id', 'name'])
        ]);
    }

    public function store(InvoiceRequest $request)
    {
        try {
            return response()->json(
                $this->handleClientInvoice->paymentInvoice($request->validated())
            );
        } catch (Exception $exception) {
            info($exception->getMessage());
            return response()->json(
                [
                    'error' => 'Something went wrong'
                ],
                Response::HTTP_SERVICE_UNAVAILABLE
            );
        }
    }
}
