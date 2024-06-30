<?php 

namespace App\Interfaces;

interface GatewayInterface{
    public function initialize(array $config) :void;
    public function createTransaction(float $amount, string $currency, string $description): TransactionInterface;
    public function executeTransaction(string $transactionId): void;
    public function cancelTransaction(string $transactionId): bool;
}