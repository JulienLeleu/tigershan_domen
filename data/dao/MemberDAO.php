<?php
namespace tigershan_domen\data\dao;
include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\database\Database.php';
include_once PHP_ROOT.'\data\entity\MemberEntity.php';
use tigershan_domen\data\database\Database;
use tigershan_domen\data\entity\MemberEntity;
use PDO;

class MemberDAO {
  //TODO retourner succes ou echec
  public static function add(MemberEntity $memberEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('INSERT INTO member(login, password, role) VALUES(:login, :password, :role)');
    $q->bindValue(':login', $memberEntity->getLogin());
    $q->bindValue(':password', $memberEntity->getPassword());
    $q->bindValue(':role', $memberEntity->getRole());
    $q->execute();
  }
  //TODO retourner succes ou echec
  public static function delete(MemberEntity $memberEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('DELETE FROM member WHERE id = :id');
    $q->bindValue(':id', $memberEntity->getId(),PDO::PARAM_INT);
    $q->execute();
  }
  
  public static function get($id)
  {
    $id = (int) $id;
    $db = Database::getInstance();
    $q = $db->prepare('SELECT * FROM member WHERE id = :id');
    $q->bindValue(':id', $id, PDO::PARAM_INT);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $memberEntity = new MemberEntity();
    if ($data)
    	$memberEntity->hydrate($data); 
    return $memberEntity;
  }
  
  public static function getList()
  {
    $members = [];
    $db = Database::getInstance();
    
    $q = $db->query('SELECT * FROM member');
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
    	$memberEntity = new MemberEntity();
    	$memberEntity->hydrate($data);
    	array_push($members, $memberEntity);
    }
    return $members;
  }
  
  //TODO retourner succes ou echec
  public static function update(MemberEntity $memberEntity)
  {
  	$db = Database::getInstance();
    $q = $db->prepare('UPDATE member SET login = :login, password = :password, role = :role WHERE id = :id');
    $q->bindValue(':login', $memberEntity->getLogin());
    $q->bindValue(':password', $memberEntity->getPassword());
    $q->bindValue(':role', $memberEntity->getRole());
    $q->bindValue(':id', $memberEntity->getId(), PDO::PARAM_INT);
    $q->execute();
  }
}
