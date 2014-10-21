<?php

class Model
{
    //region fields for connecting with db
    private static $DB_HOST = 'localhost';
    private static $DB_USER = 'root';
    private static $DB_PASS = 'toor';
    private static $DB_DBNAME = 'shop';

    //endregion

    public function connect()
    {
        mysql_connect(Model::$DB_HOST, Model::$DB_USER, Model::$DB_PASS);
        mysql_select_db(Model::$DB_DBNAME);
    }
}