<?php


namespace grozzzny\westgate\order;


use Yii;
use yii\base\Model;

class Order extends Model
{
    public $_id;
    public $id;
    public $number;
    public $comment;
    public $remark;
    public $ip;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;
    public $new;
    public $status;

    public $items;
    public $count;
    public $total;

    public $user;
    public $address;
    public $payment;
    public $shipping;
    public $amount;
    public $seller;

    public function send()
    {
        $response = Yii::$app->westgate
            ->orderCreateClient
            ->attributes($this->attributes)
            ->send();

        return $this->number = $response['number'];
    }
}