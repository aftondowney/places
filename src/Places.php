<?php

class Place 
{

		private $city;

		function __construct($city)
		{
				$this->city = $city;
		}

		function setCity($city)
		{
			$this->city = (string) $city;
		}

		function getCity()
		{
			return $this->city;
		}

		function save()
		{
			array_push($_SESSION['list_of_places'], $this);
		}
	
}