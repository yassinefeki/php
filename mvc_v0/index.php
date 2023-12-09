<?php
require 'routing/routes.php'; // ceci implique l’instanciation de Router()
$uri = isset($_GET['url']) ? "/".$_GET['url'] : '/';//récupération de l’URI
$router->dispatch($uri);