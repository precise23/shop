<?php

class Controller_Login extends Controller
{

    public static function newInstance()
    {
        return new Controller_Login();
    }

    function auth()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = self::quote_smart($_POST['login']);
            $password = self::quote_smart($_POST['password']);

            // get query by (select *)
            $query = Model_User::get_data();
            while ($row = mysql_fetch_array($query)) {
                if ($login == $row["username"] && md5($password) == $row["password"]) {
                    $data["login_status"] = "access_granted";
                    $_SESSION['session'] = $password;
                    $_SESSION['id'] = $row['id'];
                    header(Urls::$PRODUCT_LIST);
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
