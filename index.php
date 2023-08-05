<?php 
session_start();

define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app/mvc');
define('ADMIN_PATH', BASE_PATH . '/app/admin');
define('CONTENT_PATH', BASE_PATH . '/app/content');
define('BASE_URL', 'http://localhost/PRO1014');
define('ROOT', '/PRO1014');
define('LIB_URL', ROOT.'/lib');
define('CONTENT_URL', ROOT.'/app/content');
define('VIEW_SITE_PATH', ROOT . '/app/mvc/views/site');
define('CONTROLLERS_URL', ROOT.'/app/mvc/controllers');
define('UPLOAD_PRODUCTS_URL', ROOT.'/uploaded/products');
define('UPLOAD_USERS_URL', ROOT.'/uploaded/users');
define('UPLOAD_NEWS_URL', ROOT.'/uploaded/news');
define('UPLOAD_PRODUCT_URL', ROOT.'/uploaded/products');
define('UPLOAD_FILES', BASE_PATH.'\uploaded');


require BASE_PATH . '/core/Common.php';

load_app();