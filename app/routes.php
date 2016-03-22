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
    
// Liste de toutes les bières ambrées
$app->get('/biere_ambree/', function() use ($app) {
    $bieres_ambrees = $app['dao.biere']->findAmbree();
    return $app['twig']->render('bieres_ambrees.html.twig', array('bieres_ambrees' => $bieres_ambrees));
})->bind('bieres_ambrees');

// Liste de toutes les bières aromatisées
$app->get('/biere_aromatisee/', function() use ($app) {
    $bieres_aromatisees = $app['dao.biere']->findAromatisee();
    return $app['twig']->render('bieres_aromatisees.html.twig', array('bieres_aromatisees' => $bieres_aromatisees));
})->bind('bieres_aromatisees');

// Liste de toutes les bières kriek
$app->get('/biere_kriek/', function() use ($app) {
    $bieres_kriek = $app['dao.biere']->findKriek();
    return $app['twig']->render('bieres_kriek.html.twig', array('bieres_kriek' => $bieres_kriek));
})->bind('bieres_kriek');

// Liste de toutes les bières blanche
$app->get('/biere_blanche/', function() use ($app) {
    $bieres_blanches = $app['dao.biere']->findBlanche();
    return $app['twig']->render('bieres_blanches.html.twig', array('bieres_blanches' => $bieres_blanches));
})->bind('bieres_blanches');

// Liste de toutes les bières artisanale
$app->get('/biere_artisanale/', function() use ($app) {
    $bieres_artisanales = $app['dao.biere']->findArtisanale();
    return $app['twig']->render('bieres_artisanales.html.twig', array('bieres_artisanales' => $bieres_artisanales));
})->bind('bieres_artisanales');

// Liste de toutes les bières blonde
$app->get('/biere_blonde/', function() use ($app) {
    $bieres_blondes = $app['dao.biere']->findBlonde();
    return $app['twig']->render('bieres_blondes.html.twig', array('bieres_blondes' => $bieres_blondes));
})->bind('bieres_blondes');

// Liste de toutes les bières brune
$app->get('/biere_brune/', function() use ($app) {
    $bieres_brunes = $app['dao.biere']->findBrune();
    return $app['twig']->render('bieres_brunes.html.twig', array('bieres_brunes' => $bieres_brunes));
})->bind('bieres_brunes');

// Liste de toutes les bières cervoise
$app->get('/biere_cervoise/', function() use ($app) {
    $bieres_cervoises = $app['dao.biere']->findCervoise();
    return $app['twig']->render('bieres_cervoises.html.twig', array('bieres_cervoises' => $bieres_cervoises));
})->bind('bieres_cervoises');
    
// Détails sur une bière
$app->get('/biere/{code}', function($code) use ($app) {
    $biere = $app['dao.biere']->find($code);
    return $app['twig']->render('biere.html.twig', array('biere' => $biere));
})->bind('biere');


// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');