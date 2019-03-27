<?php


namespace grozzzny\westgate;

/**
 * Class BaseClient
 * @package grozzzny\westgate
 *
 * @property-read WestgateTransport $transport
 */
class BaseClient extends BaseComponent
{
    const OBJECT = '';
    const METHOD = '';

    private $_params = [];

    public function send()
    {
        return $this->response($this->transport->send());
    }

    public function response($response)
    {
        return $response;
    }

    public function addParams(array $params)
    {
        foreach ($params as $key => $value) {
            $this->_params[$key] = $value;
        }
        return $this;
    }

    public function getTransport()
    {
        return new WestgateTransport([
            'object' => static::OBJECT,
            'method' => static::METHOD,
            'params' => $this->_params,
        ]);
    }
}