<?php

use Symfony\Component\HttpFoundation\Request;

// Page d'accueil
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})->bind('home');

$app->get('/categorie/', function () use ($app) {
    $categories = $app['dao.categorie']->findAll();   
 return $app['twig']->render('categories.html.twig', array('categories' =>  $categories));
})->bind('categories');

// Liste de toutes les bières
$app->get('/biere/', function() use ($app) {
    $medicaments = $app['dao.biere']->findAll();
    return $app['twig']->render('biere.html.twig', array('bieres' => $bieres));
})->bind('bieres');