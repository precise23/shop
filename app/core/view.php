<?php

class View
{
    /**
     * @param $content_view - include page from views (using in other files)
     * @param $template_view - template_view.php
     * @param $data - check input data on page auth (using in login_view.php)
     */
    function generate($content_view, $template_view, $data = null)
    {
        include 'app/views/' . $template_view;
    }
}
