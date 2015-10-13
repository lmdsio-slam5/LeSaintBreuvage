<?php


require_once __DIR__.'/../vendor/autoload.php';


$app = new Silex\Application();


require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';


$app->run();
// require stoppe l'exécution avec une erreur fatale
// include donne seulement un message d'erreur.
// bonne pratiques : pas de fin de balises.