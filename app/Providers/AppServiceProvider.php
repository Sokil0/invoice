<?php

namespace App\Providers;

use App\Services\Invoice\CustomInvoice;
use App\Services\Invoice\InvoiceHandler;
use App\Services\Payment\Custom;
use App\Services\Payment\PaymentClient;
use App\Services\PaymentMethod\Card;
use App\Services\PaymentMethod\PaymentMethod;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentClient::class, Custom::class);
        $this->app->bind(InvoiceHandler::class, CustomInvoice::class);
        $this->app->bind(PaymentMethod::class, Card::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
