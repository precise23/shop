<!DOCTYPE HTML>
<html>
<form method="post" class="form-vertical pagination-centered" action=<?= Urls::$PRODUCT_EDITED ?>>
    <div class="table">
        <? $result = Model_Product::get_title(); ?>
        <select id="title" name="title">
            <option value="0">--Название продукта--</option>
            <? while ($row = mysql_fetch_array($result)) { ?>
                <option value=<?= $row['title'] ?>><?= $row['title'] ?></option> <? } ?>
        </select>
        <input type="text" name="new_title" placeholder="Новое название"/>
        <br>
        <? Model_Product::newInstance()->connect();
        $result = Model_Product::get_description(); ?>
        <select id="description" name="description">
            <option value="0">--Описание продукта--</option>
            <? while ($row = mysql_fetch_array($result)) { ?>
                <option value=<?= $row['description'] ?>><?= $row['description'] ?></option> <? } ?>
        </select>
        <input type="text" name="new_description" placeholder="Новое описание"/>
        <br>
        <input type="submit" name="submit" value="Готово" class="btn btn-success inline">
    </div>
</form>
</html>