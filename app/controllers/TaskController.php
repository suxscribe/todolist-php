<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class TaskController extends Controller
{
  private $pageTpl = 'add.tpl';
  private $data = array();
  private $result = array();

  public function __construct()

  {
    $this->model = new TaskModel();
    $this->view = new View();
  }

  public function add()
  {
    if (isset($_POST['title']) && isset($_POST['email']) && isset($_POST['name'])) {
      $this->data['title'] = htmlspecialchars($_POST['title']);
      $this->data['name'] = htmlspecialchars($_POST['name']);
      $this->data['email'] = htmlspecialchars($_POST['email']);
      $this->result['success'] = $this->model->addTask($this->data);
      $this->view->render($this->pageTpl, $this->result);
    }
  }
}
