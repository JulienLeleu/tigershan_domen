<?php
namespace tigershan_domen\web;

include_once __DIR__.'\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\database\Database.php';
include_once PHP_ROOT.'\data\entity\MemberEntity.php';
include_once PHP_ROOT.'\data\entity\MapEntity.php';
include_once PHP_ROOT.'\data\entity\SignEntity.php';
include_once PHP_ROOT.'\data\entity\LinkMapSignEntity.php';
include_once PHP_ROOT.'\data\dao\SignDAO.php';
include_once PHP_ROOT.'\data\dao\MapDAO.php';
include_once PHP_ROOT.'\data\dao\MemberDAO.php';

use tigershan_domen\data\database\Database;
use tigershan_domen\data\entity\MemberEntity;
use tigershan_domen\data\entity\MapEntity;
use tigershan_domen\data\entity\SignEntity;
use tigershan_domen\data\entity\LinkMapSignEntity;
use tigershan_domen\data\dao\SignDAO;
use tigershan_domen\data\dao\MapDAO;
use tigershan_domen\data\dao\MemberDAO;
use PDO;

//$bdd = new PDO('mysql:host=localhost;dbname=eplanning;charset=utf8', 'root', 'root');
$db = Database::getInstance();

/*$request = $db->query('SELECT * FROM member;');
$member = new MemberEntity();
$member->hydrate($request->fetch(PDO::FETCH_ASSOC));

$request = $db->query('SELECT * FROM map;');
$map = new MapEntity();
$map->hydrate($request->fetch(PDO::FETCH_ASSOC));

$request = $db->query('SELECT * FROM sign;');
$sign = new SignEntity();
$sign->hydrate($request->fetch(PDO::FETCH_ASSOC));

$request = $db->query('SELECT * FROM link_map_sign as entity1 INNER JOIN map as entity2 ON entity1.id_map = entity2.id INNER JOIN sign as entity3 ON entity1.id_sign = entity3.id INNER JOIN member as entity4 ON entity1.id_member = entity4.id');
$linkMapSign = new LinkMapSignEntity();
$linkMapSign->hydrate($request->fetch(PDO::FETCH_ASSOC));

$data = $request->fetch();
print_r($data);

echo $member.'<br/>';
echo $map.'<br/>';
echo $sign.'<br/>';
echo $linkMapSign.'<br/>';

echo '<br/>SIGN<br/>';
$getSign = SignDAO::get(3);
print_r(SignDAO::getList());
$sign2 = new SignEntity();
$sign2->setId(3);
$sign2->setLabel('teeeeest');
SignDAO::update($sign2);

echo '<br/>';
echo '<br/>MAP<br/>';
$getMap = MapDAO::get(3);
print_r($getMap);
echo'<br/> coordX :'.$getMap->getCoord_X();
echo '<br/>';
echo '<br/>List map : <br/>';
print_r(MapDAO::getList());
echo '<br/>';
$map2 = new MapEntity();
$map2->setId(3);
$map2->setCoord_X(10);
MapDAO::update($map2);*/

echo '<br/>';
echo '<br/>Member<br/>';
$getMember = MemberDAO::get(1);
print_r($getMember);
echo'<br/> login :'.$getMember->getLogin();
echo'<br/> password :'.$getMember->getPassword();
echo'<br/> role :'.$getMember->getRole();
echo '<br/>';
echo '<br/>List member : <br/>';
print_r(MemberDAO::getList());
echo '<br/>';
$member2 = new MemberEntity();
$member2->setId(2);
$member2->setLogin('Melanie');
$member2->setPassword('Melanie');
MemberDAO::update($member2);