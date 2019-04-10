<?php


namespace grozzzny\westgate\order;


use Yii;
use yii\base\Model;

/**
 * Class Order
 * @package grozzzny\westgate\order
 *
 * @property array $items = [
 *      [
 *           'id' => 'id',
 *           'preview' => 'preview',
 *           'title' => 'title',
 *           'seller' => 'seller',
 *           'price' => 'price',
 *           'link' => 'link',
 *           'cost' => 'cost',
 *           'quantity' => 'quantity'
 *      ]
 * ]
 * @property array $address = [
 *      'country' => 'country',
 *      'city_id' => 'city_id',
 *      'address' => 'address',
 *      'postal_Code' => 'postal_Code',
 *      'city' => 'nameCity',
 *      'fullAddress' => 'fullAddress',
 *      'enabled_point_delivery' => 'enabled_point_delivery',
 *      'point_delivery_id' => 'point_delivery_id',
 * ]
 * @property string $payment
 * @property array $user = [
 *      'id' => 'id',
 *      'username' => 'username',
 *      'email' => 'email',
 *      'name' => 'name',
 *      'date_of_birth' => 'date_of_birth',
 *      'phone' => 'phone',
 *      'inn' => 'inn',
 *      'passport' => 'passport',
 *      'passport_place' => 'passport_place',
 *      'passport_date' => 'passport_date',
 *      'passport_code' => 'passport_code',
 * ]
 * @property array $seller = [
 *      "id" => 14,
 *      "username" => "westgate",
 *      "email" => null,
 *      "name" => "ООО «ТП «ЗЕЛЕНЫЙ КОРИДОР»",
 *      "prefix" => "wg",
 *      "logo" => "",
 *      "name_bank" => "КБ \"ЭНЕРГОТРАНСБАНК\" (АО)",
 *      "correspondent_account" => "30101810800000000701",
 *      "account" => "40702810000000006314",
 *      "bik" => "042748701",
 *      "inn" => "3915008498",
 *      "kpp" => "391501001",
 *      "address" => "236010, г. Калининград, ул. Вагоностроительная, 3-5",
 *      "contacts" => "Сайт: http://tpzk.ru\r\nEmail: info@tpzk.ru\r\nТелефоны: +7 (4012) 311-485; +7 (4012) 560-188",
 *      "head" => "Цедрик Игорь Петрович",
 *      "chief_accountant" => "",
 *      "signature" => ""
 * ]
 */
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

    public function create()
    {
        $response = Yii::$app->westgate
            ->orderCreateClient
            ->attributes($this->attributes)
            ->send();

        return $this->number = $response['number'];
    }

    public function update()
    {
        $response = Yii::$app->westgate
            ->orderUpdateClient
            ->number($this->number)
            ->attributes($this->attributes)
            ->send();

        return $this->number = $response['number'];
    }
}