<?php

// Contracts - интерфейсы

// Order
// Shipping type - типы доставки

use Patterns\FabricMethod\Enums\ShippingRegion;
use Patterns\FabricMethod\Shippings\Creators\MeestExpressCalculator;
use Patterns\FabricMethod\Shippings\Creators\NovaPostCalculator;
use Patterns\FabricMethod\Shippings\Creators\ShippingCalculator;

function createOrder(ShippingCalculator $calculator, $region = ShippingRegion::EUROPE)
{
   echo $calculator->calculate($region);
}

// условно полученные данные из формы
$shippingClass = match ($_GET['type']) {
    'nova_post' => NovaPostCalculator::class,
    'meest' => MeestExpressCalculator::class,
    default => null
};

$deliveryZone = match ($_GET['delivery_zone']) {
    'usa' => ShippingRegion::USA,
    default => ShippingRegion::EUROPE
};

if ($shippingClass && class_exists($shippingClass)) {
    createOrder(
        new $shippingClass($_GET['weight'], $_GET['total']),
        $deliveryZone
    );
}
