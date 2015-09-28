<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=demo01.xyz;port=5432;dbname=cobertura',
    'username' => 'postgres',
    'password' => '0DHCBH3B',
'charset' => 'utf8',
    'schemaMap' => [
      'pgsql'=> [
        'class'=>'yii\db\pgsql\Schema',
        'defaultSchema' => 'cobertura' //specify your schema here
      ]
    ],    
];
