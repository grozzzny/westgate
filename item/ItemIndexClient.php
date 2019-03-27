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

    public function ids(array $value)
    {
        return $this->addParams(['id' => $value]);
    }
}