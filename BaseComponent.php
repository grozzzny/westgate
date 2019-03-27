<?php


namespace grozzzny\westgate;


use Yii;
use yii\base\Component;

/**
 * Class BaseComponent
 * @package grozzzny\westgate
 *
 * @property-read WestgateComponent $component
 */
class BaseComponent extends Component
{
    /**
     * @return object|null|WestgateComponent
     * @throws \yii\base\InvalidConfigException
     */
    protected function getComponent()
    {
        return Yii::$app->get(WestgateComponent::$nameComponent);
    }
}