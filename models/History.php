<?php

namespace fraksik\models;

class History
{
	public $my_date;
	public $my_event;

	public function __construct($my_date, $my_event)
	{
		$this->my_date = $my_date;
		$this->my_event = $my_event;
	}

}