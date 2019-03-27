<?php


namespace grozzzny\westgate\order;


use grozzzny\westgate\BaseClient;

/**
 * Class OrderCreateClient
 * @package grozzzny\westgate\order
 *
 */
class OrderCreateClient extends BaseClient
{
    const OBJECT = 'order';
    const METHOD = 'create';

    public function response($response)
    {
        return $response[0]['response'];
    }

    public function attributes($attributes)
    {
        return $this->addParams($attributes);
    }
}