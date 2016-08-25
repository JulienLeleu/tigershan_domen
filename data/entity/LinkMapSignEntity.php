<?php
namespace tigershan_domen\data\entity;

include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\entity\GenericEntity.php';
include_once PHP_ROOT.'\data\entity\MemberEntity.php';
include_once PHP_ROOT.'\data\entity\MapEntity.php';
include_once PHP_ROOT.'\data\entity\SignEntity.php';


/**
 * @author Julien
 *
 */
class LinkMapSignEntity extends GenericEntity
{
  private $id;
  private $map;
  private $sign;
  private $member;

  public function getId() { return $this->id; }
  public function getMap() { return $this->map; }
  public function getSign() { return $this->sign; }
  public function getMember() { return $this->member; }
  
  public function setId($id)
  {
  	$this->id = (int) $id;
  }
  
  public function setMap($map)
  {
  	$this->map = $map;
  }
  
  public function setSign($sign)
  {
  	$this->sign = $sign;
  }
  
  public function setMember($member)
  {
  	$this->member = $member;
  }
  
  /**
   * Hydrate values parameters from database array
   *
   * @param array $donnees
   */
  public function hydrate(array $data)
  {
  	$this->setId($data['ID']);
  	$this->map = new MapEntity();
  	$this->map->setId($data['ID_MAP']);
  	$this->map->setCoord_X($data['COORD_X']);
  	$this->map->setCoord_Y($data['COORD_Y']);
  	$this->sign = new SignEntity();
  	$this->sign->setId($data['ID_SIGN']);
  	$this->sign->setLabel($data['LABEL']);
  	$this->member = new MemberEntity();
  	$this->member->setId($data['ID_MEMBER']);
  	$this->member->setLogin($data['LOGIN']);
  	$this->member->setPassword($data['PASSWORD']);
  	$this->member->setRole($data['ROLE']);
  }
  
  public function __toString()
  {
  	return 'LinkMapSignEntity : ['.
  			'id:'.$this->id.', '.
  			'map:'.$this->map.', '.
  			'sign:'.$this->sign.', '.
  			'member:'.$this->member.
  			']';  			
  }
}