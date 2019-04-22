<?php

namespace grozzzny\westgate;


use grozzzny\westgate\item\ItemViewClient;
use grozzzny\westgate\item\ItemIndexClient;
use grozzzny\westgate\order\OrderCreateClient;
use grozzzny\westgate\order\OrderIndexClient;
use grozzzny\westgate\order\OrderUpdateClient;
use grozzzny\westgate\order\OrderViewClient;
use grozzzny\westgate\passport\PassportInnClient;
use grozzzny\westgate\track\TrackStatusClient;
use yii\base\Component;

/**
 * Class WestgateComponent
 * @package grozzzny\westgate
 *
 * @property-read ItemIndexClient $itemIndexClient
 * @property-read ItemViewClient $itemViewClient
 * @property-read OrderCreateClient $orderCreateClient
 * @property-read OrderViewClient $orderViewClient
 * @property-read OrderUpdateClient $orderUpdateClient
 * @property-read OrderIndexClient $orderIndexClient
 * @property-read PassportInnClient $passportInnClient
 * @property-read TrackStatusClient $trackStatusClient
 */
class WestgateComponent extends Component
{
    static $nameComponent = 'westgate';

    public $token;
    public $itemObject;
    public $categoryObject;
    public $orderObject;
    public $urlApi = 'http://goods.tpzk.ru/api';
    public $tokenParam = 'access-token';

    public function getItemIndexClient()
    {
        return new ItemIndexClient();
    }

    public function getItemViewClient()
    {
        return new ItemViewClient();
    }

    public function getOrderCreateClient()
    {
        return new OrderCreateClient();
    }

    public function getOrderViewClient()
    {
        return new OrderViewClient();
    }

    public function getOrderUpdateClient()
    {
        return new OrderUpdateClient();
    }

    public function getOrderIndexClient()
    {
        return new OrderIndexClient();
    }

    public function getPassportInnClient()
    {
        return new PassportInnClient();
    }

    public function getTrackStatusClient()
    {
        return new TrackStatusClient();
    }
}