<?php
namespace tigershan_domen\data\entity;

include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\entity\GenericEntity.php';

/**
 * 
 * @author Julien
 *
 */
class SignEntity extends GenericEntity
{
  private $id;
  private $label;

  public function getId() { return $this->id; }
  public function getLabel() { return $this->label; }

  public function setId($id)
  {
    $this->id = (int) $id;
  }
        
  public function setLabel($label)
  {
    if (is_string($label) && strlen($label) <= 255)
    {
      $this->label = $label;
    }
  }
  
  public function __toString()
  {
  	return 'SignEntity : ['.
  			'id:'.$this->id.', '.
  			'label:'.$this->label.
  			']';  			
  }
}