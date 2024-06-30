<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\PaymentFactory;
use App\TransactionInterface;

try {

    $payment = PaymentFactory::create('stripe');

    $payment->initialize(['api_key' => 'test']);

    $transaction = $payment->createTransaction(100.0, 'USD', 'Test transaction');

    if ($payment->executeTransaction($transaction)) {
        echo "Transaction exécutée avec succès. Statut: " . $transaction->getStatus();
    } else {
        echo "Échec de l'exécution de la transaction.";
    }

    $payment->cancelTransaction($transaction);
    echo "<br>Transaction annulée. Statut: " . $transaction->getStatus();
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
