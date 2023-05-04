<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class Controller
{
  public $model;
  public $view;

  protected $tasks;
  protected $total;
  protected $pageData;
  protected $limit = 3;
  protected $page;
  protected $sort;
  protected $direction;


  public function __construct()
  {
    $this->model = new Model();
    $this->view = new View();
  }

  protected function getPage()
  {
    // get page number
    $this->page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;
  }
  protected function getSort()
  {
    if (isset($_GET['sort'])) {
      $this->sort = htmlspecialchars($_GET['sort']);
      setcookie('sort', $this->sort);
    } else {
      $this->sort = isset($_COOKIE['sort']) ? htmlspecialchars($_COOKIE['sort']) : 'id';
    }
  }
  protected function getDirection()
  {
    if (isset($_GET['direction'])) {
      $this->direction = htmlspecialchars($_GET['direction']);
      setcookie('direction', $this->direction);
    } else {
      $this->direction = isset($_COOKIE['direction']) ? htmlspecialchars($_COOKIE['direction']) : 'ASC';
    }
  }
}
