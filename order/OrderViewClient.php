<?php


namespace grozzzny\westgate\order;


use grozzzny\westgate\BaseClient;
use grozzzny\westgate\order\Order;
use Yii;

/**
 * Class OrderViewClient
 * @package grozzzny\westgate\order
 *
 */
class OrderViewClient extends BaseClient
{
    const OBJECT = 'order';
    const METHOD = 'view';

    public function response($response)
    {
        $class = empty($this->component->orderObject) ? Order::className() : $this->component->orderObject;

        return Yii::createObject($class, [$response]);
    }

    public function number($number)
    {
        return $this->addParams(['number' => $number]);
    }

    public function id($id)
    {
        return $this->addParams(['_id' => $id]);
    }

    public function user(array $params)
    {
        return $this->addParams(['user' => $params]);
    }
}