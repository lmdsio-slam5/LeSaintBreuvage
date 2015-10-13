<?php


// Home page

$app->get('/', function () use ($app) {

    $articles = $app['dao.article']->findAll();   //L'appel à $app['dao.article'] renvoie un objet de la classe ArticleDAO dont on utilise ensuite la méthode findAll pour récupérer la liste des articles
 return $app['twig']->render('index.html.twig', array('articles' => $articles));
});