<?php 

namespace App\Interfaces;

interface TransactionInterface{
    public function getId(): string;
    public function getStatus(): string;
    public function getAmount(): float;
    public function getCurrency(): string;
    public function getDescription(): string;
    public function getGateway(): string;
}