<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class IndexController extends Controller
{
  private $pageTpl = 'index.tpl';


  public function __construct()
  {
    parent::__construct();

    $this->getPage();
    $this->getSort();
    $this->getDirection();

    $this->tasks = $this->model->getTasks($this->page, $this->sort, $this->direction, $this->limit);
    $this->total = $this->model->getTotal();
  }
  public function index()
  {
    $this->pageData['tasks'] = $this->tasks;
    $this->pageData['total'] = $this->total;
    $this->pageData['sort'] = $this->sort;
    $this->pageData['direction'] = $this->direction;

    $this->pageData['page'] = $this->page;
    $this->pageData['totalPages'] = ceil($this->total / $this->limit);
    $this->view->render($this->pageTpl, $this->pageData);
  }
}
