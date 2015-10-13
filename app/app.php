<?php

//La première partie de ce fichier configure Silex pour gérer les erreurs PHP qui pourraient se produire pendant l'exécution de l'application

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

//La deuxième partie du fichier enregistre le fournisseur de services associé à DBAL, DoctrineServiceProvider.
// Register global error and exception handlers

ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.

$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

//enregistre un nouveau service nommé dao.article sous la forme d'une instance partagée de la classe ArticleDAO. Une fois le service enregistré, l'appel $app['dao.article'] renverra cette instance.
// Register services.

$app['dao.article'] = $app->share(function ($app) {
    return new LeSaintBreuvage\DAO\CategorieDAO($app['db']);

});