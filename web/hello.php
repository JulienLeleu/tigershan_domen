<?php
namespace tigershan_domen\web;

include_once __DIR__.'\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\database\Database.php';
use tigershan_domen\data\database\Database;

//$bdd = new PDO('mysql:host=localhost;dbname=eplanning;charset=utf8', 'root', 'root');
$db = Database::getInstance();