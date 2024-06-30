<?php 

namespace App\Gateways;

use App\Interfaces\GatewayInterface;

abstract class AbstractGateway implements GatewayInterface{
    protected $config;

    public function initialize(array $config): void{
        $this->config = $config;
    }
}