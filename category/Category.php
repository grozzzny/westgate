<?php


namespace grozzzny\westgate\category;


use yii\base\Model;

class Category extends Model
{
    public $_id;
    public $id;
    public $title;
    public $slug;
    public $user_id;
    public $status;
    public $subcategories = [];
    public $filters = [];
    public $breadcrumb = [];
}