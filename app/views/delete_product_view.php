<!DOCTYPE HTML>
<html>
<body>

<table border="black">
    <form method="post" action=<?= Urls::$PRODUCT_DELETED ?>>
        <th>Название:
        <td>
            <? Model_Product::newInstance()->connect();
            $result = Model_Product::get_title(); ?>
            <select id="title" name="title">
                <option value="0">--Title of product--</option>
                <? while ($row = mysql_fetch_array($result)) { ?>
                    <option value=<?= $row['title']?>><?= $row['title']?></option> <?}?>
            </select>
        </td>
        </th>
        <tr/>
        <th>Описание:
        <td>
            <? Model_Product::newInstance()->connect();
            $result = Model_Product::get_description(); ?>
            <select id="description" name="description">
                <option value="0">--Description of product--</option>
                <? while ($row = mysql_fetch_array($result)) { ?>
                    <option value=<?= $row['description']?>><?= $row['description']?></option> <?}?>
            </select>
        </td>
        </th>
        <td>
            <input type="submit" name="submit" value="Готово" class="btn btn-success">
        </td>
    </form>
</table>

</body>
</html>