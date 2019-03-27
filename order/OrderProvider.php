<?php


namespace grozzzny\westgate\order;


use grozzzny\westgate\DefaultProvider;
use grozzzny\westgate\order\Order;

/**
 * Class OrderProvider
 * @package grozzzny\westgate\order
 *
 * @property-read Order[] $items
 */
class OrderProvider extends DefaultProvider
{
    protected function classItem()
    {
        return empty($this->component->orderObject) ? Order::className() : $this->component->orderObject;
    }
}