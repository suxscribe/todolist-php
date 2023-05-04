<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class Model
{
  protected $db = null;

  public function __construct()
  {
    $this->db = new DBConn();
  }

  public function getTasks($page = 1, $sort = 'id', $direction = 'ASC', $limit = 5)
  {
    $offset = $limit * ($page - 1);
    $result = $this->db->connection->query("SELECT * FROM tasks ORDER BY $sort $direction LIMIT $limit OFFSET $offset ");
    if ($result) {
      $rows = array();

      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }

      return $rows;
    } else {
      die('Error getTasks: ' . $this->db->connection->error);
    }
  }

  public function getTotal()
  {
    $result = $this->db->connection->query("SELECT count(*) FROM tasks");
    if ($result) {
      $row = $result->fetch_row();
      return $row[0];
    } else {
      die('Error getTotal: ' . $this->db->connection->error);
    }
  }

  public function delete($id)
  {
    $query = "DELETE FROM tasks WHERE id=" . $this->db->connection->real_escape_string($id);

    if ($this->db->connection->query($query)) {
      echo 'Task deleted';
    } else {
      die('Error: ' . $this->db->connection->error);
    }
  }
}
