<?php

//La première partie de ce fichier configure Silex pour gérer les erreurs PHP qui pourraient se produire pendant l'exécution de l'application

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

//La deuxième partie du fichier enregistre le fournisseur de services associé à DBAL, DoctrineServiceProvider.
// Register global error and exception handlers

ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.

// Register service providers.
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app['twig'] = $app->share($app->extend('twig', function(Twig_Environment $twig, $app) {
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    return $twig;
    }));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

$app['dao.utilisateur'] = $app->share(function ($app) {
    $utilisateurDAO = new LeSaintBreuvage\DAO\UtilisateurDAO($app['db']);
    return $utilisateurDAO;
});


//enregistre un nouveau service nommé dao.categorie sous la forme d'une instance partagée de la classe CategorieDAO. Une fois le service enregistré, l'appel $app['dao.categorie'] renverra cette instance.
// Register services.

$app['dao.categorie'] = $app->share(function ($app) {
    return new LeSaintBreuvage\DAO\CategorieBiereDAO($app['db']);
    
});
$app['dao.biere'] = $app->share(function ($app) {
    $biereDAO = new LeSaintBreuvage\DAO\BiereDAO($app['db']);
    $biereDAO->setCategorieDAO($app['dao.categorie']);
    return $biereDAO;
});

$app['dao.panier'] = $app->share(function ($app) 
{
    return new LeSaintBreuvage\DAO\PanierDAO($app['db']);
});
$app['dao.achat'] = $app->share(function ($app) 
{
    return new LeSaintBreuvage\DAO\AchatDAO($app['db']);
});