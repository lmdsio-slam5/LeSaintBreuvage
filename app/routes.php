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
    $articles_femmes = $app['dao.biere_ambree']->findAll();
    return $app['twig']->render('bieres_ambrees.html.twig', array('bieres_ambrees' => $bieres_ambrees));
})->bind('bieres_ambrees');
    
// Détails sur une bière
$app->get('/biere/{code}', function($code) use ($app) {
    $biere = $app['dao.biere']->find($code);
    return $app['twig']->render('bieres_details.html.twig', array('biere' => $biere));
})->bind('biere');

// Login
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
        ));
})->bind('login');

// Profil utilisateur
$app->match('/profil', function(Request $request) use ($app) {
    $visiteur = $app['user'];
    $visiteurFormView = null;
    $visiteurForm = $app['form.factory']->create(new VisiteurType(), $visiteur);
    $visiteurForm->handleRequest($request);
    if ($visiteurForm->isSubmitted() && $visiteurForm->isValid()) {
        $plainPassword = $visiteur->getPassword();
        // find the encoder for a UserInterface instance
        $encoder = $app['security.encoder_factory']->getEncoder($visiteur);
        // compute the encoded password
        $password = $encoder->encodePassword($plainPassword, $visiteur->getSalt());
        $visiteur->setPassword($password); 
        $app['dao.visiteur']->save($visiteur);
        $app['session']->getFlashBag()->add('success', 'Vos informations personnelles ont été mises à jour.');
    }
    $visiteurFormView = $visiteurForm->createView();
    return $app['twig']->render('visiteurs.html.twig', array('visiteurForm' => $visiteurFormView));
})->bind('visiteur');
//Mot de passe
$app->get('/hashpwd', function() use ($app){
    $rawPassword='admin';
    $salt='%qugq3NAYfC1MKwrW?yevbE';
    $encoder = $app['security.encoder.digest'];
    return $encoder->encodePassword($rawPassword, $salt);
});
