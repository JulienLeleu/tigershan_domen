<?php
namespace tigershan_domen\web;
include_once __DIR__.'\..\ConstantsNavigation.php';

include_once PHP_ROOT.'/vendor/route/RouteManager.php';

$router->get('/', function(){
     include_once PHP_ROOT."/web/webapp/page/home/home.php";
});

$router->get('/login', function(){
	include_once PHP_ROOT."/web/webapp/page/login/login.php";
});
	
$router->get('/notifications', function(){
  if(!isset($_SESSION['member_id'])/*!user_connected()*/) {
    header('Location: /login');
  } else {

  }
});

try {
  $router->run();
} catch (\Exception $e) {
  echo 'Error 404 - Page Not Found';
  header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
  exit;
}
 ?>
