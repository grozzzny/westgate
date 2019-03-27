<?php


namespace grozzzny\westgate\item;


use grozzzny\westgate\BaseClient;
use grozzzny\westgate\item\Item;
use Yii;

/**
 * Class ItemViewClient
 * @package grozzzny\westgate\item
 *
 */
class ItemViewClient extends BaseClient
{
    const OBJECT = 'item';
    const METHOD = 'view';

    public function response($response)
    {
        $class = empty($this->component->itemObject) ? Item::className() : $this->component->itemObject;

        return Yii::createObject($class, [$response]);
    }

    public function id($id)
    {
        return $this->addParams(['id' => $id]);
    }
}