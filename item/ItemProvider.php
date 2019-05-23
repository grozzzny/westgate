<?php


namespace grozzzny\westgate\item;


use grozzzny\westgate\BaseComponent;
use grozzzny\westgate\DefaultProvider;
use grozzzny\westgate\category\Category;
use grozzzny\westgate\item\Item;
use Yii;

/**
 * Class ItemProvider
 * @package grozzzny\westgate\item
 *
 * @property-read \grozzzny\westgate\category\Category $category
 * @property-read Item[] $items
 */
class ItemProvider extends DefaultProvider
{
    private $_category;

    /** @var integer */
    public $price_min;

    /** @var integer */
    public $price_max;

    public function setCategory($value)
    {
        $this->_category = $value;
    }

    public function getCategory()
    {
        $class = empty($this->component->categoryObject) ? Category::className() : $this->component->categoryObject;
        return Yii::createObject($class, [$this->_category]);
    }

    protected function classItem()
    {
        return empty($this->component->itemObject) ? Item::className() : $this->component->itemObject;
    }
}