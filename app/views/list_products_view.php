<table border="black" class="table-bordered table">
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Категория</th>
    </tr>
    <? Model_Product::newInstance()->connect();
    $result = Model_Product::get_product_by_user_id($_SESSION['id']);
    while ($row = mysql_fetch_array($result)) {
        echo "<tr><td>" . htmlentities($row['title']) . "</td>";
        echo "<td>" . htmlentities($row['description']) . "</td>";
        echo "<td>" . htmlentities($row['category_name']) . "</td></tr>\n";
    } ?>
</table>
<div class="control-group">
    <form name="create" style="float: left; padding-right: 5px;" method="post" action=<?= Urls::$PRODUCT_CREATE ?>>
        <input type="submit" value="Создать" class="btn btn-success">
    </form>
    <form name="delete" style="float: left; padding-right: 5px;" method="post" action=<?= Urls::$PRODUCT_DELETE ?>>
        <input type="submit" value="Удалить" class="btn btn-danger">
    </form>
    <form name="edit" method="post" action=<?= Urls::$PRODUCT_EDIT ?>>
        <input type="submit" value="Редактировать" class="btn btn-warning">
    </form>
</div>