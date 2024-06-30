<?php

use PHPUnit\Framework\TestCase;
use App\StripePayment;
use App\Transaction;

//test unitaire stripe

class StripePaymentTest extends TestCase {
    public function testCreateTransaction() {
        $payment = new StripePayment();
        $payment->initialize(['api_key' => 'test']);
        $transaction = $payment->createTransaction(100.0, 'USD', 'Test transaction');
        $this->assertInstanceOf(Transaction::class, $transaction);
    }

    public function testExecuteTransaction() {
        $payment = new StripePayment();
        $payment->initialize(['api_key' => 'test']);
        $transaction = new Transaction(100.0, 'USD', 'Test transaction');
        $result = $payment->executeTransaction($transaction);
        $this->assertTrue($result);
        $this->assertEquals('success', $transaction->getStatus());
    }

    public function testCancelTransaction() {
        $payment = new StripePayment();
        $payment->initialize(['api_key' => 'test']);
        $transaction = new Transaction(100.0, 'USD', 'Test transaction');
        $result = $payment->cancelTransaction($transaction);
        $this->assertTrue($result);
        $this->assertEquals('canceled', $transaction->getStatus());
    }
}
