<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<body>

<table border="black">
    <form method="post" action=<?= Urls::$PRODUCT_CREATED ?>>
        <th>Название:
        <td>
            <input type="text" name="title"/>
        </td>
        </th>
        <tr/>
        <th>Описание:
        <td>
            <input type="text" name="description"/>
        </td>
        </th>
        <tr/>
        <th>Категория:
        <td>
            <? Model_Product::newInstance()->connect();
            $result = Model_Product::get_categories(); ?>
            <select id="category" name="category">
                <option value="0">--Category of product--</option>
                <? while ($row = mysql_fetch_array($result)) { ?>
                    <option value=<?= $row['category_name'] ?>><?= $row['category_name'] ?></option> <? } ?>
            </select>
        </td>
        </th>
        <td>
            <input type="text" name="new_category"/>
        </td>
        <td>
            <input type="submit" name="submit" value="Готово" class="btn btn-success"/>
        </td>
    </form>
</table>

</body>
</html>