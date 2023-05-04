<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class View
{
  public function render($tpl, $data = null)
  {
    include ROOT . '/app/views/header.tpl.php';
    include ROOT . '/app/views/' . $tpl . '.php';
    include ROOT . '/app/views/footer.tpl.php';
  }
}
