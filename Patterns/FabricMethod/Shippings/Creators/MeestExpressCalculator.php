<?php

namespace Patterns\FabricMethod\Shippings\Creators;

use Patterns\FabricMethod\Contracts\Shipping;
use Patterns\FabricMethod\Shippings\MeestExpress;
use Patterns\FabricMethod\Shippings\NovaPost;

class MeestExpressCalculator extends ShippingCalculator
{

    protected function getShipping(): Shipping
    {
        return new MeestExpress($this->weight, $this->totalPrice);
    }
}