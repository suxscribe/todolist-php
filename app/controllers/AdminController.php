<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class AdminController extends Controller
{
  private $pageTpl = 'admin-auth.tpl';
  private $adminTpl = 'admin.tpl';
  private $taskTpl = 'task.tpl';
  private $login;
  private $password;

  public function __construct()
  {
    $this->view = new View();
    $this->model = new AdminModel();

    $this->getPage();
    $this->getSort();
    $this->getDirection();

    $this->tasks = $this->model->getTasks($this->page, $this->sort, $this->direction, $this->limit);
    $this->total = $this->model->getTotal();
  }
  public function index()
  {

    // if user is logged in show admin template
    if (isset($_SESSION['user'])) {
      $this->pageData['user'] = $_SESSION['user'];

      $this->pageData['tasks'] = $this->tasks;
      $this->pageData['total'] = $this->total;
      $this->pageData['sort'] = $this->sort;
      $this->pageData['direction'] = $this->direction;

      $this->pageData['page'] = $this->page;
      $this->pageData['totalPages'] = ceil($this->total / $this->limit);
      $this->view->render($this->adminTpl, $this->pageData);
    } else {
      header('Location: /admin/login');
    }
  }

  public function login()
  {
    if (!isset($_SESSION['user'])) {

      if (isset($_POST['login']) && isset($_POST['password'])) {
        $this->login = htmlspecialchars($_POST['login']);
        $this->password = htmlspecialchars($_POST['password']);

        if ($this->model->checkUser($this->login, $this->password)) {
          $_SESSION['user'] = $this->login;
          header('Location: /admin');
        } else {
          $this->pageData['error'] = 'Wrong login or password';
        }
      }

      $this->view->render($this->pageTpl, $this->pageData);
    } else {
      header('Location: /admin');
    }
  }
  public function task($param = null)
  {
    if (isset($_SESSION['user'])) {

      $this->pageData['id'] = $param;
      $this->pageData['task'] = $this->model->getTask($param);
      $this->pageData['success'] = (isset($_GET['success']) ? htmlspecialchars($_GET['success']) : 0);
      $this->view->render($this->taskTpl, $this->pageData);
    }
  }
  public function edit()
  {
    if (isset($_SESSION['user'])) {

      if (isset($_POST['id']) && isset($_POST['title'])) {
        $task = array();
        $id = htmlspecialchars($_POST['id']);
        $task['title'] = htmlspecialchars($_POST['title']);
        $task['status'] = (isset($_POST['status']) ? htmlspecialchars($_POST['status']) : 0);
        if ($this->model->editTask($id, $task)) {
          header('Location: /admin/task/' . $id . '?success=1');
        }
      }
    }
  }

  public function logout()
  {
    unset($_SESSION['user']);
    header('Location: /');
  }
}
