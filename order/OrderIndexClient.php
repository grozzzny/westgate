<?php


namespace grozzzny\westgate\order;


use grozzzny\westgate\ProviderClient;

/**
 * Class OrderIndexClient
 * @package grozzzny\westgate\order
 *
 */
class OrderIndexClient extends ProviderClient
{
    const OBJECT = 'order';
    const METHOD = 'index';

    public function response($response)
    {
        return new OrderProvider($response);
    }

    public function user(array $params)
    {
        return $this->addParams(['user' => $params]);
    }
}