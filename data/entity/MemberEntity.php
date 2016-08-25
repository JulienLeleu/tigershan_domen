<?php
namespace tigershan_domen\data\entity;

include_once __DIR__.'\..\..\ConstantsNavigation.php';
include_once PHP_ROOT.'\data\entity\GenericEntity.php';

/**
 * 
 * @author Julien
 *
 */
class MemberEntity extends GenericEntity
{
  private $id;
  private $login;
  private $password;
  private $role;

  public function getId() { return $this->id; }
  public function getLogin() { return $this->login; }
  public function getPassword() { return $this->password; }
  public function getRole() { return $this->role; }

  public function setId($id)
  {
    $this->id = (int) $id;
  }
        
  public function setLogin($login)
  {
    if (is_string($login) && strlen($login) <= 255)
    {
      $this->login = $login;
    }
  }
  
  public function setPassword($password)
  {
  	if (is_string($password) && strlen($password) <= 255)
  	{
  		$this->password = $password;
  	}
  }
  
  public function setRole($role)
  {
  	$this->role = (int) $role;
  }
  
  public function __toString()
  {
  	return 'MemberEntity : ['.
  			'id:'.$this->id.', '.
  			'login:'.$this->login.', '.
  			'password:'.$this->password.', '.
  			'role:'.$this->role.
  			']';  			
  }
}