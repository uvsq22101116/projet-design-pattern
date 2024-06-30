<?php 

namespace App\Managers;

use App\Managers\GatewayManager;

class TransactionManager{
    private static $instance = null;
    private $gatewayManager;

    private function __construct() {
        $this->gatewayManager = GatewayManager::getInstance();
    }

    public static function getInstance(): TransactionManager{
        if (self::$instance === null) {
            self::$instance = new TransactionManager();
        }
        return self::$instance;
    }
    
    public function createTransaction(string $gatewayName, float $amount, string $currency, string $description){
        $gateway = $this->gatewayManager->getGateway($gatewayName);
        return $gateway->createTransaction($amount, $currency, $description);
    }

    public function executeTransaction($transaction){
        $gateway = $this->gatewayManager->getGateway($transaction->getGateway());
        return $gateway->executeTransaction($transaction->getId());
    }

    public function cancelTransaction($transaction){
        $gateway = $this->gatewayManager->getGateway($transaction->getGateway());
        return $gateway->cancelTransaction($transaction->getId());
    }
}