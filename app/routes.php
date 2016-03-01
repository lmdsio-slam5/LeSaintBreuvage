<?php

use Symfony\Component\HttpFoundation\Request;

// Page d'accueil
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})->bind('home');

// recherche de bieres par catégorie
$app->get('/categorie/', function () use ($app) {
    $categories = $app['dao.categorie']->findAll();   
 return $app['twig']->render('categories.html.twig', array('categories' =>  $categories));
})->bind('categories');

// Liste de toutes les bières
$app->get('/biere/', function() use ($app) {
    $bieres = $app['dao.biere']->findAll();
    return $app['twig']->render('bieres.html.twig', array('bieres' => $bieres));
})->bind('bieres');

// Résultats de la recherche de bières
$app->post('/biere/resultats/', function(Request $request) use ($app) {
    $categorieCode = $request->request->get('categorie');
    $bieres = $app['dao.biere']->findAllByCategorieBiere($categorieCode);
    return $app['twig']->render('biere_resultats.html.twig', array('bieres' => $bieres));
})->bind('biere_resultats');

// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');