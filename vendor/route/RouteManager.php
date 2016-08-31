<?php
// Inclusion de l'autoloader
require "Router/Router.php";
require "Router/Route.php";
require "Router/RouterException.php";

$router = new Router\Router($_GET['url']);

?>
