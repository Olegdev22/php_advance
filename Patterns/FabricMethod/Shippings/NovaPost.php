<?php

namespace Patterns\FabricMethod\Shippings;

use Patterns\FabricMethod\Contracts\Shipping;

class NovaPost implements Shipping
{

    public float $weight, $totalPrice;

    public function __construct(float $weight, float $totalPrice)
    {
        $this->weight = $weight;
        $this->totalPrice = $totalPrice;
    }

    public function calculateShippingCost(): float
    {
        if ($this->totalPrice > 200) {
            return 0;
        }
        return $this->weight * 0.25;
    }
}