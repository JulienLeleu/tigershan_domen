<?php
namespace tigershan_domen\data\entity;

class GenericEntity {
	
	/**
	 * Hydrate values parameters from database array
	 * 
	 * @param array $donnees
	 */
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value)
		{
			// get the setter name associated to attribute.
			$method = 'set'.ucfirst($key);
	
			// if setter associated exist.
			if (method_exists($this, $method))
			{
				// We call the setter.
				$this->$method($value);
			}
		}
	}
}