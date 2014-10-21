<?php

class Model_User extends Model
{

    public static function newInstance()
    {
        return new Model_User();
    }

    public static function get_data()
    {
        $data = mysql_query(Query::$USER);
        mysql_close();
        return $data;
    }
} 