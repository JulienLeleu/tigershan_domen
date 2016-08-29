<?php
namespace tigershan_domen\data\dao;
include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\database\Database.php';
include_once PHP_ROOT.'\data\entity\LinkMapSignEntity.php';
use tigershan_domen\data\database\Database;
use tigershan_domen\data\entity\LinkMapSignEntity;
use PDO;

class LinkMapSignDAO {
	
  //TODO retourner succes ou echec
  public static function add(LinkMapSignEntity $linkMapSignEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('INSERT INTO link_map_sign(id_map, id_sign, id_member) VALUES(:id_map, :id_sign, :id_member)');
    $q->bindValue(':id_map', $linkMapSignEntity->getMap()->getId());
    $q->bindValue(':id_sign', $linkMapSignEntity->getSign()->getId());
    $q->bindValue(':id_member', $linkMapSignEntity->getMember()->getId());
    $q->execute();
  }
  
  //TODO retourner succes ou echec
  public static function delete(LinkMapSignEntity $linkMapSignEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('DELETE FROM link_map_sign WHERE id = :id');
    $q->bindValue(':id', $linkMapSignEntity->getId(),PDO::PARAM_INT);
    $q->execute();
  }
  
  public static function get($id)
  {
    $id = (int) $id;
    $db = Database::getInstance();
    $q = $db->prepare('SELECT * FROM link_map_sign WHERE id = :id');
    $q->bindValue(':id', $id, PDO::PARAM_INT);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $linkMapSignEntity = new LinkMapSignEntity();
    if ($data)
    	$linkMapSignEntity->hydrate($data); 
    return $linkMapSignEntity;
  }
  
  public static function getList()
  {
    $linkMapSigns = [];
    $db = Database::getInstance();
    
    $q = $db->query('SELECT * FROM link_map_sign');
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
    	$linkMapSignEntity = new LinkMapSignEntity();
    	$linkMapSignEntity->hydrate($data);
    	array_push($linkMapSigns, $linkMapSignEntity);
    }
    return $linkMapSigns;
  }
  
  //TODO retourner succes ou echec
  public static function update(LinkMapSignEntity $linkMapSignEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('UPDATE link_map_sign SET id_map = :id_map, id_sign = :id_sign, id_member = :id_member WHERE id = :id');
    $q->bindValue(':id_map', $linkMapSignEntity->getMap()->getId());
    $q->bindValue(':id_sign', $linkMapSignEntity->getSign()->getId());
    $q->bindValue(':id_sign', $linkMapSignEntity->getMember()->getId());
    $q->bindValue(':id', $linkMapSignEntity->getId(), PDO::PARAM_INT);
    $q->execute();
  }
}
