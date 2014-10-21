<?php

class Model_Product extends Model
{
    public static function newInstance()
    {
        return new Model_Product();
    }

    public static function get_product_by_user_id($user_id)
    {
        $data = mysql_query(Query::$LIST_PRODUCTS . $user_id);
        mysql_close();
        return $data;
    }

    public static function get_categories()
    {
        $data = mysql_query(Query::$CATEGORY);
        mysql_close();
        return $data;
    }

    public static function get_title()
    {
        $data = mysql_query(Query::$TITLE . Query::$USER_ID_WHERE . $_SESSION['id']);
        mysql_close();
        return $data;
    }

    public static function get_description()
    {
        $data = mysql_query(Query::$DESCRIPTION . Query::$USER_ID_WHERE . $_SESSION['id']);
        mysql_close();
        return $data;
    }

    public static function add_product_by_category($user_id, $title, $description, $category)
    {
        mysql_query(Query::$INSERT_PRODUCTS . "{$user_id}, '{$title}', '{$description}')");
        $data = mysql_query(Query::$PRODUCT_ID .
            Query::$USER_ID_WHERE . $user_id .
            Query::$TITLE_WHERE . "'{$title}'" .
            Query::$DESCRIPTION_WHERE . "'{$description}'");

        // get row from db products
        $row = mysql_fetch_array($data);
        $product_id = $row['id'];
        mysql_query(Query::$INSERT_CATEGORIES . "{$product_id}, '{$category}')");
        mysql_close();
    }

    public static function delete_product_by_dropdown($user_id, $title, $description)
    {
        mysql_query(Query::$DELETE_PRODUCTS .
            Query::$USER_ID_WHERE . $user_id .
            Query::$TITLE_WHERE . "'{$title}'" .
            Query::$DESCRIPTION_WHERE . "'{$description}'");
        mysql_close();
    }

    public static function edit_product_by_dropdown($user_id, $title, $description, $new_title, $new_description)
    {
        mysql_query(Query::$UPDATE_PRODUCTS .
            Query::$TITLE_SET . "'{$new_title}'" .
            Query::$DESCRIPTION_SET . "'{$new_description}'" .
            Query::$USER_ID_WHERE . "'{$user_id}'" .
            Query::$TITLE_WHERE . "'{$title}'" .
            Query::$DESCRIPTION_WHERE . "'{$description}'");
        mysql_close();
    }
}