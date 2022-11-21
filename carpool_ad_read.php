<?php

use App\Controllers\CarpoolAdController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdController();
echo $controller->getCarpoolAd();
