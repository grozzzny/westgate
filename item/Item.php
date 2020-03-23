<?php


namespace grozzzny\westgate\item;


use grozzzny\lang\models\Lang;
use main\components\LangHelper;
use Yii;
use yii\base\Model;

class Item extends Model
{
    public $_id;
    public $id;
    public $category;
    public $breadcrumb;
    public $categories = [];
    public $slug;
    public $short;
    public $title;
    public $image_file;
    public $description;
    public $price;
    public $currency;
    public $created_at;
    public $updated_at;
    public $status;
    public $discount;
    public $weight;
    public $price_min;
    public $price_max;

    /**
     * @var array = [
     *      "id" => "id",
     *      "username" => "username",
     *      "email" => "publicEmail",
     *      "name" => "name",
     * ]
     */
    public $seller = [];

    /**
     * @var array = [
     *     'dataProperties' => [
     *         'attribute' => [
     *             'value' => 'null',
     *             'label' => 'string',
     *             'type' => 'string | integer | select | checkbox | html | category | multicategory | itemscategory | datetime | image | file | code',
     *             'settings' => [
     *                 'group' => 'my_group',
     *                 'scenarios' => 'user',
     *                 'description' => '',
     *                 'example_1' => '',
     *                 'example_2' => '',
     *                 'filter_show' => true,
     *                 'filter_show_admin' => true,
     *                 'characteristic' => true,
     *                 'multiple' => true,
     *                 'variations' => true,
     *             ],
     *             'options' => [
     *                 'key' => 'value'
     *             ],
     *         ]
     *     ],
     * ]
     */
    public $dataProperties = [];

    /**
     * @var array = [
     *      [
     *          'count' => 4,
     *          'discount' => 11,
     *          'id' => 111,
     *          'item_id' => 66,
     *          'user_id' => 66,
     *          'price' => 3333,
     *          'stock' => [
     *              'user_id' => 14,
     *              'id' => 1,
     *              'slug' => "main_stock",
     *              'name' => "Главный склад",
     *              'country' => "Россия",
     *              'region' => "Калининградская область",
     *              'city' => "Калининград",
     *              'address' => "Вагоностроительная"
     *          ],
     *          'uid' => "WG00000234",
     *          'dataProperties' => [
     *              'attribute' => [
     *                  'value' => 'null',
     *                  'label' => 'string',
     *                  'type' => 'string | integer | select | checkbox | html | category | multicategory | itemscategory | datetime | image | file | code',
     *                  'settings' => [
     *                      'group' => 'my_group',
     *                      'scenarios' => 'user',
     *                      'description' => '',
     *                      'example_1' => '',
     *                      'example_2' => '',
     *                      'filter_show' => true,
     *                      'filter_show_admin' => true,
     *                      'characteristic' => true,
     *                      'multiple' => true,
     *                      'variations' => true,
     *                  ],
     *                  'options' => [
     *                      'key' => 'value'
     *                  ],
     *              ]
     *          ],
     *      ]
     * ]
     */
    public $variations = [];
    public $vendor_code;

    public function getTitle()
    {
        return LangHelper::translate($this->title);
    }
    public function getShort()
    {
        return LangHelper::translate($this->short);
    }
    public function getDescription()
    {
        return LangHelper::translate($this->description);
    }
}