<?php


namespace grozzzny\westgate;


use yii\base\Exception;
use yii\httpclient\Client;

/**
 * Class WestgateTransport
 * @package grozzzny\westgate
 *
 * @property-read string $httpMethod
 */
class WestgateTransport extends BaseComponent
{
    public $object;
    public $method;
    public $params = [];

    public function send()
    {
        $url = $this->component->urlApi . '/' . $this->object . '/' . $this->method ;

        $client = (new Client())->createRequest()
            ->setUrl([$url, $this->component->tokenParam => $this->component->token])
            ->setFormat(Client::FORMAT_JSON)
            ->setMethod($this->httpMethod);

        if(!empty($this->params)) $client->setData($this->params);

        $response = $client->send();

        if (!$response->isOk) $this->exception($response->content);

        if(self::is_assoc($response->data)) {
            if ($response->data['status'] !== 'success') $this->exception($response->content);
            return $response->data['response'];
        } else {
            foreach ($response->data as $data) {
                if ($data['status'] !== 'success') $this->exception($response->content);
            }
            return $response->data;
        }
    }

    public function getHttpMethod()
    {
        switch ($this->method){
            case 'index':
            case 'view':
                return 'GET';
            case 'create':
            case 'update':
            case 'delete':
            case 'inn':
                return 'POST';
            default:
                return 'POST';
        }
    }

    /**
     * Tests if an array is associative or not.
     *
     * @param array array to check
     * @return boolean
     */
    protected static function is_assoc(array $array)
    {
        // Keys of the array
        $keys = array_keys($array);

        // If the array keys of the keys match the keys, then the array must
        // not be associative (e.g. the keys array looked like {0:0, 1:1...}).
        return array_keys($keys) !== $keys;
    }

    protected function exception($message)
    {
        throw new Exception($message);
    }
}