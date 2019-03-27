<?php


namespace grozzzny\westgate;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Model;

/**
 * Class DefaultProvider
 * @package grozzzny\westgate
 *
 * @property-read Model $items
 */
class DefaultProvider extends BaseComponent
{
    /** @var integer */
    public $totalCount;

    /** @var integer */
    public $count;

    /** @var integer */
    public $currentPage;

    /** @var integer */
    public $pageCount;

    private $_items = [];

    public function setItems($value)
    {
        $class = $this->classItem();
        foreach ($value as $item) {
            $this->_items[] = Yii::createObject($class, [$item]);
        }
    }

    public function getItems()
    {
        return $this->_items;
    }

    protected function classItem()
    {
        throw new InvalidConfigException(\Yii::t('app', 'Not found class item'));
    }
}