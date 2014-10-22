<form method="post" class="form-vertical pagination-centered">
    <legend>
        <h1>Страница авторизации</h1>
    </legend>
    <div class="control-group">
        <input type="text" id="login" name="login" placeholder="Логин" class="span3">
        <br>
        <input type="password" id="password" name="password" placeholder="Пароль" class="span3">
        <br>
        <button type="submit" name="btn" class="btn btn-primary btn-large">Войти</button>
    </div>
</form>

<?php extract($data); ?>
<?php if ($login_status == "access_granted") { ?>
    <p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif ($login_status == "access_denied") { ?>
    <p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } ?>
