<?php

namespace Patterns\FabricMethod\Contracts;

interface Shipping
{
    public function __construct(float $weight, float $totalPrice);

    public function calculateShippingCost(): float;
}