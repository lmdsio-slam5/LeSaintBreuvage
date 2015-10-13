

<?php

//Ce fichier contient les options de configuration liés au développement de notre application. 
// include the prod configuration

require __DIR__.'/prod.php';


// enable the debug mode

$app['debug'] = true;