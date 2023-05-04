<?
define('ACCESS', true);
session_start();


define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('CONTROLLER_PATH', ROOT . '/app/controllers/');
define('VIEW_PATH', ROOT . '/app/views/');
define('MODEL_PATH', ROOT . '/app/models/');

require_once ROOT . '/app/config/db.php';
require_once ROOT . '/app/config/route.php';

require_once CONTROLLER_PATH . 'Controller.php';
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';

Route::makeRoute();
