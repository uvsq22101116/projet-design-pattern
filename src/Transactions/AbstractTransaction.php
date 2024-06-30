<?php

namespace App\Transactions;

use App\Interfaces\TransactionInterface;

abstract class AbstractTransaction implements TransactionInterface{
    private $id;
    private $amount;
    private $currency;
    private $description;
    private $status;

    public function __construct(string $id, float $amount, string $currency, string $description, $status){
        $this->id = $id;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->description = $description;
        $this->status = $status;
    }

    public function setStatus(string $status): void{
        $this->status = $status;
    }

    public function getId(): string{
        return $this->id;
    }

    public function getStatus(): string{
        return $this->status;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function getDescription(): string {
        return $this->description;
    }
}