<?php

namespace Patterns\FabricMethod\Shippings;

use Patterns\FabricMethod\Contracts\Shipping;

class MeestExpress implements Shipping
{

    public float $weight, $totalPrice;

    public function __construct(float $weight, float $totalPrice)
    {
        $this->weight = $weight;
        $this->totalPrice = $totalPrice;
    }

    public function calculateShippingCost(): float
    {
        return $this->weight * 0.2;
    }
}