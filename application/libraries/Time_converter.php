<?php

class Time_converter {

	public function convert_to_twentyfour_hrs_time(string $time) : string
	{
		return date_format(date_create($time), 'H:i');
	}
}