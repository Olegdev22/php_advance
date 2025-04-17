<?php

namespace Patterns\FabricMethod\Shippings\Creators;

use Patterns\FabricMethod\Contracts\Shipping;
use Patterns\FabricMethod\Shippings\NovaPost;

class NovaPostCalculator extends ShippingCalculator
{

    protected function getShipping(): Shipping
    {
        return new NovaPost($this->weight, $this->totalPrice);
    }
}