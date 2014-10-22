<form method="post" class="form-horizontal pagination-centered" action=<?= Urls::$PRODUCT_DELETED ?>>
    <? Model_Product::newInstance()->connect();
    $result = Model_Product::get_title(); ?>
    <select id="title" name="title">
        <option value="0">--Название продукта--</option>
        <? while ($row = mysql_fetch_array($result)) { ?>
            <option value=<?= $row['title'] ?>><?= $row['title'] ?></option> <? } ?>
    </select>
    <? Model_Product::newInstance()->connect();
    $result = Model_Product::get_description(); ?>
    <select id="description" name="description">
        <option value="0">--Описание продукта--</option>
        <? while ($row = mysql_fetch_array($result)) { ?>
            <option value=<?= $row['description'] ?>><?= $row['description'] ?></option> <? } ?>
    </select>
    <input type="submit" name="submit" value="Готово" class="btn btn-success">
</form>