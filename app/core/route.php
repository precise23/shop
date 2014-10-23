<?php

class Route
{
    public static function start()
    {
        session_start();
        Model::newInstance()->connect();
        try {
            $action = null;
            if (isset($_GET["controller"]) && isset($_GET["action"])) {
                $action = $_GET["action"];
                if (isset($_SESSION['session'])) {
                    if ($action == 'auth')
                        header(Urls::$PRODUCT_LIST);
                } else if (!isset($_SESSION['session']))
                    if ($action != 'auth')
                        header(Urls::$AUTH);
            } else if (isset($_SESSION['session']))
                header(Urls::$PRODUCT_LIST);
            else header(Urls::$AUTH);

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
                case 'logout':
                    session_destroy();
                    header(Urls::$AUTH);
                    break;
            }
        } catch (Exception $error) {
            session_destroy();
            Route::errorPage404();
        }
        mysql_close();
    }

    public static function errorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
