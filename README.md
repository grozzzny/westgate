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
List items:
```php
$client = Yii::$app->westgate->itemIndexClient
    ->category($slug)
    ->search($search);
$provider = new WestgateDataProvider(['client' => $client]);
```

View orders:
```php
$client = Yii::$app->westgate->orderIndexClient->user(['email' => Yii::$app->user->identity->email]);
$provider = new WestgateDataProvider(['client' => $client]);
```

Get inn:
```php
$inn = Yii::$app->westgate->passportInnClient
    ->passportParams($fio, $birthdate, $docnum, $docdt, $dcode)
    ->send();
```
