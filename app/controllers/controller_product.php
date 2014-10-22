<?php

class Controller_Product extends Controller
{
    public static function newInstance()
    {
        return new Controller_Product();
    }

    function get_list_products()
    {
        session_start();
        if ($_SESSION['session'] != null) {
            $this->view->generate('list_products_view.php', 'template_view.php');
        } else {
            session_destroy();
            Route::errorPage404();
        }
    }

    function choose_action($action)
    {
        session_start();
        if ($_SESSION['session'] != null) {
            switch ($action) {
                case 'create':
                    $this->view->generate('create_product_view.php', 'template_view.php');
                    break;
                case 'delete':
                    $this->view->generate('delete_product_view.php', 'template_view.php');
                    break;
                case 'edit':
                    $this->view->generate('edit_product_view.php', 'template_view.php');
            }
        } else {
            session_destroy();
            Route::errorPage404();
        }
    }

    function created_product()
    {
        $category = $_POST['new_category'];
        if ($category == null)
            $category = $_POST['category'];
        session_start();
        if ($_SESSION['session'] != null) {
            Model_Product::newInstance()->connect();
            Model_Product::add_product_by_category(
                $_SESSION['id'],
                $_POST['title'],
                $_POST['description'],
                $category
            );
            $this->view->generate('list_products_view.php', 'template_view.php');
        } else {
            session_destroy();
            Route::errorPage404();
        }
    }

    function deleted_product()
    {
        session_start();
        if ($_SESSION['session'] != null) {
            Model_Product::newInstance()->connect();
            Model_Product::delete_product_by_dropdown(
                $_SESSION['id'],
                $_POST['title'],
                $_POST['description']
            );
            $this->view->generate('delete_product_view.php', 'template_view.php');
        } else {
            session_destroy();
            Route::errorPage404();
        }
    }

    function edited_product()
    {
        session_start();
        if ($_SESSION['session'] != null) {
            Model_Product::newInstance()->connect();
            Model_Product::edit_product_by_dropdown(
                $_SESSION['id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['new_title'],
                $_POST['new_description']
            );
            $this->view->generate('edit_product_view.php', 'template_view.php');
        } else {
            session_destroy();
            Route::errorPage404();
        }
    }
} 