<?php
namespace tigershan_domen\data\entity;

include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\entity\GenericEntity.php';

/**
 * 
 * @author Julien
 *
 */
class MapEntity extends GenericEntity
{
  private $id;
  private $coord_x;
  private $coord_y;

  public function getId() { return $this->id; }
  public function getCoord_X() { return $this->coord_x; }
  public function getCoord_Y() { return $this->coord_y; }

  public function setId($id)
  {
    $this->id = (int) $id;
  }
  
  public function setCoord_X($coord_x)
  {
  	$this->coord_x = (int) $coord_x;
  }
  
  public function setCoord_Y($coord_y)
  {
  	$this->coord_y = (int) $coord_y;
  }
  
  public function __toString()
  {
  	return 'MapEntity : ['.
  			'id:'.$this->id.', '.
  			'coord_x:'.$this->coord_x.', '.
  			'coord_y:'.$this->coord_y.
  			']';  			
  }
}