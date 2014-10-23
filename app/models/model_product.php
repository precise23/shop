<?php

class Model_Product extends Model
{
    public static function newInstance()
    {
        return new Model_Product();
    }

    public static function get_product_by_user_id($user_id)
    {
        return mysql_query(Query::$LIST_PRODUCTS . $user_id);
    }

    public static function get_categories()
    {
        return mysql_query(Query::$CATEGORY);
    }

    public static function get_title()
    {
        return mysql_query(Query::$TITLE . Query::$USER_ID_WHERE . $_SESSION['id']);
    }

    public static function get_description()
    {
        return mysql_query(Query::$DESCRIPTION . Query::$USER_ID_WHERE . $_SESSION['id']);
    }

    public static function add_product_in_category($user_id, $title, $description, $category)
    {
        $data = mysql_query(Query::$CATEGORY_ID . Query::$CATEGORY_NAME_WHERE . "'{$category}'");

        // get row from table categories
        $row = mysql_fetch_array($data) or die(mysql_error());
        $category_id = $row['id'];
        mysql_query(Query::$INSERT_PRODUCTS . "{$user_id}, {$category_id}, '{$title}', '{$description}')");

    }

    public static function delete_product_by_dropdown($user_id, $title, $description)
    {
        mysql_query(Query::$DELETE_PRODUCTS .
            Query::$USER_ID_WHERE . $user_id .
            Query::$TITLE_WHERE . "'{$title}'" .
            Query::$DESCRIPTION_WHERE . "'{$description}'");
    }

    public static function edit_product_by_dropdown($user_id, $title, $description, $new_title, $new_description)
    {
        mysql_query(Query::$UPDATE_PRODUCTS .
            Query::$TITLE_SET . "'{$new_title}'" .
            Query::$DESCRIPTION_SET . "'{$new_description}'" .
            Query::$USER_ID_WHERE . "'{$user_id}'" .
            Query::$TITLE_WHERE . "'{$title}'" .
            Query::$DESCRIPTION_WHERE . "'{$description}'");
    }
}