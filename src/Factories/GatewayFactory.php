<?php

namespace App\Factories;

use App\Gateways\StripeGateway;

use Error;

class GatewayFactory {
    public static function create(array $config) {
        return match ($config['name']) {
            'stripe' => new StripeGateway($config),
            default => throw new Error("Unsupported gateway: " + $config['name'])
        };
    }
}
