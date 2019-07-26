<?php

require dirname(dirname(__DIR__)) . "/vendor/autoload.php";

require dirname(__DIR__) . '/dependencies.php';

PurchaseSalesInventory\Providers\Encryption\SodiumKey::readyKey($container);
// PurchaseSalesInventory\Providers\Encryption\DefuseKey::readyKey($container);
