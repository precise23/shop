<?php

class Controller_Login extends Controller
{

    public static function newInstance()
    {
        return new Controller_Login();
    }

    function auth()
    {
        // connecting to database
        Model_User::newInstance()->connect();
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            // get query by (select *)
            $query = Model_User::get_data();
            while ($row = mysql_fetch_array($query)) {
                if ($login == $row["username"] && $password == $row["password"]) {
                    $data["login_status"] = "access_granted";

                    session_start();
                    $_SESSION['session'] = $password;
                    $_SESSION['id'] = $row['id'];
                    header(Urls::$LOCATION_PRODUCT_LIST);
                    exit;
                } else {
                    $data["login_status"] = "access_denied";
                }
            }
        } else {
            $data["login_status"] = "";
        }

        // generate view
        $this->view->generate('login_view.php', 'template_view.php', $data);
    }

}
