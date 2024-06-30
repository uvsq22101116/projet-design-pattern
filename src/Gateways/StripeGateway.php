<?php 

namespace App\Gateways;

use App\Interfaces\TransactionInterface;
use App\Transactions\StripeTransaction;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class StripeGateway extends AbstractGateway{
    public function initialize(array $config): void{
        parent::initialize($config);
        if (!isset($config['api_key'])) {
            throw new \Exception("Stripe API key is required.");
        }
        Stripe::setApiKey($config['api_key']);
        $this->config = $config;
    }

    public function createTransaction(float $amount, string $currency, string $description): TransactionInterface{
        $paymentIntent = PaymentIntent::create([
            'amount' => $amount * 100, // TODO adapter
            'currency' => $currency,
            'description' => $description,
            'return_url' => 'https://www.google.com/',
            'payment_method' => 'pm_card_visa',
            'confirm' => true
        ]);
        return new StripeTransaction(
            $paymentIntent->id,
            $paymentIntent->amount,
            $paymentIntent->currency,
            $paymentIntent->description,
            $paymentIntent->status
        );
    }

    public function executetransaction(string $transactionId): void{
        $paymentIntent = PaymentIntent::retrieve($transactionId);
        $paymentIntent->confirm();
    }

    public function canceltransaction(string $transactionId): bool{
        $paymentIntent = PaymentIntent::retrieve($transactionId);
        $paymentIntent->cancel();

        return $paymentIntent->status === 'canceled';
    }

}