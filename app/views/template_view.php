<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Магазин</title>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.css"/>
    <script src="resources/js/jquery-1.6.2.js" type="text/javascript"></script>
    <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <ul id="header" class="nav nav-pills">
        <li><a href="/index.php?controller=product&action=list">Главная</a></li>
        <? if (isset($_SESSION['session']))
            echo "<li><a href='/index.php?controller=product&action=logout'>Выход</a></li>";
        ?>
    </ul>
    <div id="page">
        <?php include 'app/views/' . $content_view; ?>
    </div>

    <div id="footer" class="navbar-fixed-bottom row-fluid">
        <a href="/index.php?controller=product&action=list">My Shop</a> &copy; 2014</a>
    </div>
</body>
</html>