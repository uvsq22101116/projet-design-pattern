<?php

namespace App\Managers;

use App\Factories\GatewayFactory;

class GatewayManager
{
    private static $instance = null;
    private $gateways = [];

    private function __construct() {
        $gatewayConfig = require __DIR__.'/../../config/GatewayConfig.php';
        foreach ($gatewayConfig as $config) {
            $this->gateways[$config['name']] = GatewayFactory::create($config);
            $this->gateways[$config['name']]->initialize($config);
        }
    }

    public static function getInstance(): GatewayManager{
        if (self::$instance === null) {
            self::$instance = new GatewayManager();
        }
        return self::$instance;
    }

    public function getGateway(string $name)
    {
        if (!isset($this->gateways[$name])) {
            throw new \Exception("Gateway not found: " + $name);
        }
        return $this->gateways[$name];
    }
}