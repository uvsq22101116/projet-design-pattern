<?php

use PHPUnit\Framework\TestCase;
use App\Transaction;

class TransactionTest extends TestCase {
    public function testTransactionCreation() {
        $transaction = new Transaction(100.0, 'USD', 'Test transaction');
        
        $this->assertEquals(100.0, $transaction->getAmount());
        $this->assertEquals('USD', $transaction->getCurrency());
        $this->assertEquals('Test transaction', $transaction->getDescription());
        $this->assertEquals('pending', $transaction->getStatus());
    }

    public function testTransactionStatus() {
        $transaction = new Transaction(100.0, 'USD', 'Test transaction');
        $transaction->setStatus('success');
        
        $this->assertEquals('success', $transaction->getStatus());
    }
}
