<?php

return [
    'id' => 'yii2-test-console',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bajhoe/user' => dirname(dirname(dirname(__DIR__))),
        '@tests' => dirname(dirname(__DIR__)),
    ],
    'components' => [
        'log'   => null,
        'cache' => null,
        'db'    => require __DIR__ . '/db.php',
    ],
];
