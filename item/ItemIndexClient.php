<?php


namespace grozzzny\westgate\item;

use grozzzny\westgate\ProviderClient;

/**
 * Class ItemIndexClient
 * @package grozzzny\westgate\item
 *
 */
class ItemIndexClient extends ProviderClient
{
    const OBJECT = 'item';
    const METHOD = 'index';

    public function response($response)
    {
        return new ItemProvider($response);
    }

    public function category($value)
    {
        return $this->addParams(['category' => $value]);
    }

    public function search($value)
    {
        return $this->addParams(['search_text' => $value]);
    }

    public function priceRange($price_from = null, $price_to = null)
    {
        if(!empty($price_from)) $this->addParams(['price_from' => $price_from]);
        if(!empty($price_to)) $this->addParams(['price_to' => $price_to]);

        return $this;
    }

    public function properties($params)
    {
        foreach ($params as $param => $val){
            $this->addParams([$param => $val]);
        }

        return $this;
    }

    public function allParams($params)
    {
        foreach ($params as $param => $val){
            $this->addParams([$param => $val]);
        }

        return $this;
    }

    public function ids(array $value)
    {
        return $this->addParams(['id' => $value]);
    }
}