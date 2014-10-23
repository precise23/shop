<?php

class Query
{
    public static $USER = "select * from users";
    public static $LIST_PRODUCTS = "select * from users u inner join products p on p.user_id = u.id
                                    inner join categories c on p.category_id = c.id where p.user_id = ";
    public static $CATEGORY = "select distinct category_name from categories";
    public static $TITLE = "select distinct title from products";
    public static $DESCRIPTION = "select distinct description from products";
    public static $INSERT_PRODUCTS = "insert into products(user_id, category_id, title, description) values(";
    public static $PRODUCT_ID = "select id from products";
    public static $TITLE_WHERE = " and title = ";
    public static $DESCRIPTION_WHERE = " and description = ";
    public static $USER_ID_WHERE = " where user_id = ";
    public static $CATEGORY_ID = "select id from categories";
    public static $CATEGORY_NAME_WHERE = " where category_name = ";
    public static $TITLE_SET = " set title = ";
    public static $DESCRIPTION_SET = ", description = ";
    public static $INSERT_CATEGORIES = "insert into categories(category_name) values(";
    public static $DELETE_PRODUCTS = "delete from products";
    public static $UPDATE_PRODUCTS = "update products";
}