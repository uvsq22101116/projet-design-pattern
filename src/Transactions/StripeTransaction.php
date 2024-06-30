<?php

namespace App\Transactions;

class StripeTransaction extends AbstractTransaction{
    public function getGateway(): string{
        return 'stripe';
    }
}
