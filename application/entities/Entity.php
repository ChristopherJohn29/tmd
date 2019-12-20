<?php

namespace Mobiledrs\entities;

class Entity {
	
	public function __set(string $property_name, string $property_value = null)
	{
		if ( ! property_exists($this, $property_name)) 
		{
			throw new \Exception("'{$property_name}' is not a part of the class");
		}

		$this->$property_name = $property_value;
	}

	public function __get(string $property_name) : string
	{
		if ( ! property_exists($this, $property_name))
		{
			throw new \Exception("'{$property_name}' is not a part of the class");	
		}

		return $this->$property_name ?? '';
	}

	public function __isset(string $property_name) : bool
    {
    	if ( ! property_exists($this, $property_name))
		{
			return false;
		}

		return true;
    }

    public function set_date_format(string $date)
    {
    	return ( ! empty($date)) ? date_format(date_create($date), 'Y-m-d') : NULL;
    }

    public function get_date_format(string $date) : string
    {
    	return ( ! empty($date) && $date != '0000-00-00') ? date_format(date_create($date), 'm/d/Y') : '';
    }

    public function get_number_format(string $number) : string
    {
		return ( ! empty($number)) ? ('$' . number_format($number, 2)) : '';
    }

    public function get_time_format(string $time)
    {
    	return date('h:i:s A', strtotime($time));
    }
}