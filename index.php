<?php

require_once('./vendor/autoload.php');
require_once(__DIR__.'/src/Managers/TransactionsManager.php');

use App\Managers\TransactionManager;

$TM = TransactionManager::getInstance();
$stripeTransaction = $TM->createTransaction('stripe', 100, 'USD', 'test');
$TM->executeTransaction($stripeTransaction);