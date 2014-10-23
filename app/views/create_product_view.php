<form method="post" class="form-vertical pagination-centered" action=<?= Urls::$PRODUCT_CREATED ?>>
    <input type="text" name="title" placeholder="Название"/>
    <br>
    <input type="text" name="description" placeholder="Описание"/>
    <br>
    <? $result = Model_Product::get_categories(); ?>
    <select id="category" name="category">
        <option value="0">--Категория продукта--</option>
        <? while ($row = mysql_fetch_array($result)) { ?>
            <option value=<?= $row['category_name'] ?>><?= $row['category_name'] ?></option> <? } ?>
    </select>
    <br>
    <input type="submit" name="submit" value="Готово" class="btn btn-success"/>
</form>
