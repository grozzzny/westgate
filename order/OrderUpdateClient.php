<?php


namespace grozzzny\westgate\order;


use grozzzny\westgate\BaseClient;

/**
 * Class OrderCreateClient
 * @package grozzzny\westgate\order
 *
 */
class OrderUpdateClient extends BaseClient
{
    const OBJECT = 'order';
    const METHOD = 'update';

    public function response($response)
    {
        return $response[0]['response'];
    }

    public function number($number)
    {
        return $this->addParams(['number' => $number]);
    }

    public function id($id)
    {
        return $this->addParams(['id' => $id]);
    }

    public function attributes($attributes)
    {
        return $this->addParams($attributes);
    }
}