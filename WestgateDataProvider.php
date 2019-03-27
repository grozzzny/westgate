<?php


namespace grozzzny\westgate;


use grozzzny\westgate\item\ItemIndexClient;
use Yii;
use yii\base\InvalidConfigException;
use yii\data\BaseDataProvider;
use yii\data\Pagination;

/**
 * Class WestgateDataProvider
 * @package grozzzny\westgate
 *
 * @property DefaultProvider $response
 */
class WestgateDataProvider extends BaseDataProvider
{
    public $key;

    /**
     * @var ProviderClient
     */
    public $client;

    /**
     * @var DefaultProvider
     */
    private $_response;

    public function __construct(array $config = [])
    {
        // is calculated after the request
        $config['pagination']['totalCount'] = false;
        parent::__construct($config);
    }

    public function getResponse()
    {
        if(empty($this->_response)) $this->prepareModels();
        return $this->_response;
    }

    /**
     * {@inheritdoc}
     */
    protected function prepareModels()
    {
        if(empty($this->client)) return [];

        if (!$this->client instanceof ProviderClient) {
            throw new InvalidConfigException('The "client" property must be an instance ProviderClient or its subclasses.');
        }

        if (($pagination = $this->getPagination()) !== false) {
            $pagination->validatePage = false;
            $this->client->limit($pagination->getLimit())->offset($this->offset($pagination));
        }

        if (($sort = $this->getSort()) !== false) {
            $this->client->addOrderBy($this->sortParam($sort->attributeOrders));
        }

        $this->_response = empty($this->_response) ? $this->client->send() : $this->_response;

        if ($pagination !== false) {
            $pagination->totalCount = $this->getTotalCount();
        }

        return $this->response->items;
    }

    /**
     * @param Pagination $pagination
     * @return int
     */
    protected function offset($pagination)
    {
        $pageSize = $pagination->getPageSize();

        return $pageSize < 1 ? 0 : $pagination->getPage() + 1;
    }

    protected function sortParam($attributeOrders)
    {
        $value = '';
        foreach ($attributeOrders as $key => $val){
            $value .= ($val == SORT_DESC ? '-' : '') . $key;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    protected function prepareKeys($models)
    {
        if ($this->key !== null) {
            $keys = [];
            foreach ($models as $model) {
                if (is_string($this->key)) {
                    $keys[] = $model[$this->key];
                } else {
                    $keys[] = call_user_func($this->key, $model);
                }
            }

            return $keys;
        }

        return array_keys($models);
    }

    /**
     * {@inheritdoc}
     */
    protected function prepareTotalCount()
    {
        if(empty($this->client)) return 0;

        if (!$this->client instanceof ProviderClient) {
            throw new InvalidConfigException('The "client" property must be an instance ProviderClient or its subclasses.');
        }
        return (int) $this->_response->totalCount;
    }
}