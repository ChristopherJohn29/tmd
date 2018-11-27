<?php

class Entity {
	
	public function __set(string $property_name, string $property_value)
	{
		if ( ! property_exists($this, $property_name)) 
		{
			throw new Exception("'{$property_name}' is not a part of the User class");
		}

		$this->$property_name = $property_value;
	}

	public function __get(string $property_name) : string
	{
		if ( ! property_exists($this, $property_name))
		{
			throw new Exception("'{$property_name}' is not a part of this User class");	
		}

		return $this->$property_name;
	}
}