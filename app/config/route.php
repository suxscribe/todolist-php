<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class Route
{
  public static $controller;
  public static $action;
  public static $params;

  public static function makeRoute()
  {

    // Default controller and action
    $controllerName = 'IndexController';
    $modelName = 'IndexModel';
    $action = 'index';
    $param = null;

    // Get controller and action from URL
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = explode('/', $url);

    if (isset($url[1]) && $url[1] != '') {
      $controllerName = ucfirst(htmlspecialchars($url[1])) . 'Controller';
      $modelName = ucfirst(htmlspecialchars($url[1])) . 'Model';
    }

    // Include controller and model
    $controllerFile = CONTROLLER_PATH . $controllerName . '.php';
    if (is_file($controllerFile)) {
      require $controllerFile;

      $modelFile = MODEL_PATH . $modelName . '.php';
      if (is_file($modelFile)) {
        require $modelFile;
      }

      // Get action form url
      if (isset($url[2]) && $url[2] != '') {
        $action = htmlspecialchars($url[2]);
      }

      // Get params form url
      if (isset($url[3]) && $url[3] != '') {
        $param = htmlspecialchars($url[3]);
      }

      // Call controller and action
      $controller = new $controllerName();
      $controller->$action($param);
    }
  }
}
