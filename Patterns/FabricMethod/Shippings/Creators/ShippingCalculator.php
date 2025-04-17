<?php

namespace Patterns\FabricMethod\Shippings\Creators;

use Patterns\FabricMethod\Contracts\Shipping;
use Patterns\FabricMethod\Enums\ShippingRegion;

abstract class ShippingCalculator
{
    public function __construct(
        readonly protected float $weight,
        readonly protected float $totalPrice)
    {
    }

    abstract protected function getShipping(): Shipping;

    public function calculate(ShippingRegion $region): float
    {
        $shipping = $this->getShipping();
        $price = $shipping->calculateShippingCost();

        if ($region === ShippingRegion::USA) {
            $price += $price * 0.2;
        }
        return round($price, 2);
    }
}