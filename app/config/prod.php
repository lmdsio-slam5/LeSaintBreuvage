<?php


// Doctrine (db)

$app['db.options'] = array(

    'driver'   => 'pdo_mysql',

    'charset'  => 'utf8',

    'host'     => 'localhost',

    'port'     => '3306',

    'dbname'   => 'lesaintbreuvage',

    'user'     => 'lesaintb_user',

    'password' => 'biere',

);

//Il s'agit du paramétrage de la connexion à la base de données via DBAL.