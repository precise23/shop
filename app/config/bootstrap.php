<?php

const path = '/var/www/shop/app/';

//region core
require_once path . 'core/model.php';
require_once path . 'core/view.php';
require_once path . 'core/controller.php';
require_once path . 'core/route.php';
//endregion

//region controllers
require_once path . 'controllers/controller_login.php';
require_once path . 'controllers/controller_product.php';
//endregion

//region models
require_once path . 'models/model_user.php';
require_once path . 'models/model_product.php';
//endregion


require_once 'urls.php';
require_once 'query.php';

Route::start();
