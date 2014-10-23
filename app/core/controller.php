<?php

class Controller
{
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}

    protected static function quote_smart($value)
    {
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        if (!is_numeric($value)) {
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }
}
