<?php

class Controller_Product extends Controller
{
    public static function newInstance()
    {
        return new Controller_Product();
    }

    function get_list_products()
    {
        $this->view->generate('list_products_view.php', 'template_view.php');
    }

    function choose_action($action)
    {
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
    }

    function created_product()
    {
        Model_Product::add_product_in_category(
            $_SESSION['id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['category']
        );
        $this->view->generate('list_products_view.php', 'template_view.php');
    }

    function deleted_product()
    {
        Model_Product::delete_product_by_dropdown(
            $_SESSION['id'],
            $_POST['title'],
            $_POST['description']
        );
        $this->view->generate('delete_product_view.php', 'template_view.php');
    }

    function edited_product()
    {
        Model_Product::edit_product_by_dropdown(
            $_SESSION['id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['new_title'],
            $_POST['new_description']
        );
        $this->view->generate('edit_product_view.php', 'template_view.php');
    }
}