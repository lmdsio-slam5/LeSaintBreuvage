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


// ajout au panier
$app->get('/panier/ajouter/{id_visiteur}/{codeArt}', function ($id_visiteur, $codeArt) use ($app) {
	//
	$Articles = $app['dao.article']->findAllArticle();
	//
	if (!$app['dao.panier']->articleExistant($id_visiteur, $codeArt))
	{
		$app['dao.panier']->addProduct($id_visiteur, $codeArt);
		$app['session']->getFlashBag()->add('panier', '   Cet article a bien été ajouté au panier.');
	}
	else
	{
		$app['session']->getFlashBag()->add('panier_error', 'Vous avez déja cet article dans votre panier!');
	}
    return $app->redirect($app["url_generator"]->generate("article", array('code' => $codeArt)));
});

// retrait au panier
$app->get('/panier/enlever/{id_visiteur}/{codeArt}', function ($id_visiteur, $codeArt) use ($app) {
	//
	$Articles = $app['dao.article']->findAllArticle();
	//
	if ($app['dao.panier']->articleExistant($id_visiteur, $codeArt))
	{
		$app['dao.panier']->removeProduct($id_visiteur, $codeArt);
		$app['session']->getFlashBag()->add('panier', 'L\'article a bien été enlevé du panier.');
	}
	else
	{
		$app['session']->getFlashBag()->add('panier_error', 'Impossible d\'enlever cet article du panier !');
    }
    return $app->redirect($app["url_generator"]->generate("article", array('code' => $codeArt)));
});

// Le panier
$app->get('/monpanier/{id}', function ($id) use ($app) {
	//
	$categories = $app['dao.article']->findAllArticle();
	//
	$articles = $app['dao.panier']->findProductsByUser($id);
	$prix = $app['dao.panier']->totalPanier($id);
    return $app['twig']->render('Panier.html.twig', array('categories' => $categories, 'articles' => $articles, 'prix' => $prix));
});

//vider le panier
$app->get('/panier/{id}', function ($id) use ($app) {
	//
	$categories = $app['dao.article']->findAllArticle();
	//
	$prix = $app['dao.panier']->totalPanier($id);
	$date = date("Y-m-d");
	$app['dao.achat']->addAchat($id, $prix, $date);
	$app['dao.panier']->supprimerPanier($id);
	
	$articles = $app['dao.panier']->findProductsByUser($id);
	$prix = $app['dao.panier']->totalPanier($id);
    return $app['twig']->render('Panier.html.twig', array('categories' => $categories, 'articles' => $articles, 'prix' => $prix));
});
// Login form
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
});
//Mot de passe
$app->get('/hashpwd', function() use ($app){
    $rawPassword='admin';
    $salt='%qugq3NAYfC1MKwrW?yevbE';
    $encoder = $app['security.encoder.digest'];
    return $encoder->encodePassword($rawPassword, $salt);
});