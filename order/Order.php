<?php


namespace grozzzny\westgate\order;


use Yii;
use yii\base\Model;

class Order extends Model
{
    const STATUS_WAITING = 'waiting';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SENT = 'sent';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAIL = 'fail';
    const STATUS_REMOVE = 'remove';

    const PAID_STATUS = true;
    const PAID_STATUS_NOT = false;

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
    public $paid_status;

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