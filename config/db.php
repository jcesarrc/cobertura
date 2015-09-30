<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=80.240.141.203;port=8081;dbname=cobertura',
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
