<?php
$MODE_PRODUCTION = 1;

if ($MODE_PRODUCTION)
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=cobertura',
        'username' => 'postgres',
        'password' => 'postgres',
        'charset' => 'utf8',
        /*'schemaMap' => [
            'pgsql' => [
                'class' => 'yii\db\pgsql\Schema',
                'defaultSchema' => 'public'
            ]
        ],*/
    ];
else
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=172.17.0.34;port=5432;dbname=cobertura',
        'username' => 'postgres',
        'password' => 'M@$t3r',
        'charset' => 'utf8',
    ];