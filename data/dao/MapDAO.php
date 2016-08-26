<?php
namespace tigershan_domen\data\dao;
include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\database\Database.php';
include_once PHP_ROOT.'\data\entity\MapEntity.php';
use tigershan_domen\data\database\Database;
use tigershan_domen\data\entity\MapEntity;
use PDO;
class MapDAO {
  //TODO retourner succes ou echec
  public static function add(MapEntity $mapEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('INSERT INTO map(coord_x, coord_y) VALUES(:coord_x, :coord_y)');
    $q->bindValue(':coord_x', $mapEntity->getCoord_X());
    $q->bindValue(':coord_y', $mapEntity->getCoord_Y());
    $q->execute();
  }
  //TODO retourner succes ou echec
  public static function delete(MapEntity $mapEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('DELETE FROM map WHERE id = :id');
    $q->bindValue(':id', $mapEntity->getId(),PDO::PARAM_INT);
    $q->execute();
  }
  public static function get($id)
  {
    $id = (int) $id;
    $db = Database::getInstance();
    $q = $db->prepare('SELECT * FROM sign WHERE id = :id');
    $q->bindValue(':id', $id, PDO::PARAM_INT);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $mapEntity = new MapEntity();
    if ($data)
    $mapEntity->hydrate($data);
    
    return $mapEntity;
  }
  public static function getList()
  {
    $maps = [];
    $db = Database::getInstance();
    
    $q = $db->query('SELECT * FROM map');
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
    	$mapEntity = new MapEntity();
    	$mapEntity->hydrate($data);
    	array_push($maps, $mapEntity);
    }
    return $maps;
  }
  //TODO retourner succes ou echec
  public static function update(SignEntity $signEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('UPDATE map SET coord_x = :coord_x, coord_y = :coord_y WHERE id = :id');
    $q->bindValue(':coord_x', $signEntity->getCoord_X());
    $q->bindValue(':coord_y', $signEntity->getCoord_Y());
    $q->bindValue(':id', $signEntity->getId(), PDO::PARAM_INT);
    $q->execute();
  }
}
