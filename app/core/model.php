<?php

class Model extends Config
{
    public static function newInstance()
    {
        return new Model();
    }

    public function connect()
    {
        mysql_connect(Config::$DB_HOST, Config::$DB_USER, Config::$DB_PASS);
        mysql_select_db(Config::$DB_DBNAME);
    }
}