<?php
namespace tigershan_domen\data\dao;

include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\database\Database.php';
include_once PHP_ROOT.'\data\entity\SignEntity.php';
use tigershan_domen\data\database\Database;
use tigershan_domen\data\entity\SignEntity;
use PDO;

class SignDAO {

  //TODO retourner succes ou echec
  public static function add(SignEntity $signEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('INSERT INTO sign(label) VALUES(:label)');
    $q->bindValue(':label', $signEntity->getLabel());
    $q->execute();
  }

  //TODO retourner succes ou echec
  public static function delete(SignEntity $signEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('DELETE FROM sign WHERE id = :id');
    $q->bindValue(':id', $signEntity->getId(),PDO::PARAM_INT);
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

    $signEntity = new SignEntity();
    if ($data)
    $signEntity->hydrate($data);
    
    return $signEntity;
  }

  public static function getList()
  {
    $signs = [];
    $db = Database::getInstance();
    
    $q = $db->query('SELECT * FROM sign ORDER BY label');

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
    	$signEntity = new SignEntity();
    	$signEntity->hydrate($data);
    	array_push($signs, $signEntity);
    }

    return $signs;
  }

  //TODO retourner succes ou echec
  public static function update(SignEntity $signEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('UPDATE sign SET label = :label WHERE id = :id');
    $q->bindValue(':label', $signEntity->getLabel());
    $q->bindValue(':id', $signEntity->getId(), PDO::PARAM_INT);
    $q->execute();
  }
}
