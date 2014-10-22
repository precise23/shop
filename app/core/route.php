<?php

class Route
{
    public static function start()
    {
        try {
            $action = 0;
            if (isset($_GET["controller"]) && isset($_GET["action"])) {
                $action = $_GET["action"];
            }

            switch ($action) {
                default:
                    break;
                case 'auth':
                    Controller_Login::newInstance()->auth();
                    break;
                case 'list':
                    Controller_Product::newInstance()->get_list_products();
                    break;
                case 'create':
                case'delete':
                case 'edit':
                    Controller_Product::newInstance()->choose_action($action);
                    break;
                case 'created':
                    Controller_Product::newInstance()->created_product();
                    break;
                case 'deleted':
                    Controller_Product::newInstance()->deleted_product();
                    break;
                case 'edited':
                    Controller_Product::newInstance()->edited_product();
                    break;
            }
        } catch (Exception $error) {
            Route::errorPage404();
        }
    }

    public static function errorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
