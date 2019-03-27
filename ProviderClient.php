<?php


namespace grozzzny\westgate;

use Yii;
use yii\base\InvalidConfigException;

/**
 * Class DefaultProvider
 * @package grozzzny\westgate
 */
class ProviderClient extends BaseClient
{
    public function addOrderBy($value)
    {
        return $this->addParams(['sort' => $value]);
    }

    public function limit($value)
    {
        return $this->addParams(['per-page' => $value]);
    }

    public function offset($value)
    {
        return $this->addParams(['page' => $value]);
    }
}