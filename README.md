Westgate component for yii2 - westgate.market
==============================

## Installation guide
```bash
$ php composer.phar require grozzzny/westgate "dev-master"
```

\config\web.php

```php

$config = [
    ...
    'components' => [
        ...
        'westgate' => [
            'class' => 'grozzzny\westgate\WestgateComponent',
            'token' => 'qwertyuiop1234567890',
            //'itemObject' => 'main\models\ItemObject',
            //'categoryObject' => 'main\models\CategoryObject',
            //'orderObject' => 'main\models\OrderObject',
        ],
        ...
    ],
    ...
];

return $config;

```
