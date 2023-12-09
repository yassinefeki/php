<?php
require "Router.php";
$router = new Router();
// Define routes
$router->addRoute('/', 'ControllerHome@index');
//jdid
//$router->addRoute('/', 'ControllerLogin@index');
//$router->addRoute('/signin', 'ControllerLogin@signin');


$router->addRoute('/products', 'ControllerProduit@index');
//$router->addRoute('/products/show', 'ControllerProduit@show');
$router->addRoute('/products/create', 'ControllerProduit@create');
$router->addRoute('/products/createProcess', 'ControllerProduit@createProcess');
$router->addRoute('/products/edit', 'ControllerProduit@edit');
$router->addRoute('/products/editProcess', 'ControllerProduit@editProcess');

$router->addRoute('/products/delete', 'ControllerProduit@delete');


//jdid

// Ajouter une route pour afficher le formulaire de connexion
$router->addRoute('/login', 'ControllerUser@showLoginForm');

// Ajouter une route pour traiter les données du formulaire de connexion
$router->addRoute('/loginProcess', 'ControllerUser@loginProcess');

// Ajouter une route pour la déconnexion
$router->addRoute('/logout', 'ControllerUser@logout');

// Ajouter une route pour afficher le formulaire d'inscription
$router->addRoute('/signin', 'ControllerUser@showSignupForm');

// Ajouter une route pour traiter les données du formulaire d'inscription
$router->addRoute('/signupProcess', 'ControllerUser@signupProcess');