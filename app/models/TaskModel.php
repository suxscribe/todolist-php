<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class TaskModel extends Model
{

  public function addTask($data)
  {
    $keys = array();
    $values = array();

    foreach ($data as $key => $value) {
      $keys[] = "`" . $this->db->connection->real_escape_string($key) . "`";
      $values[] = "'" . $this->db->connection->real_escape_string($value) . "'";
    }

    $query = "INSERT INTO tasks (" . implode(",", $keys) . ") VALUES (" . implode(",", $values) . ")";

    if ($this->db->connection->query($query)) {
      return true;
    } else {
      die('Error: ' . $this->db->connection->error);
    }
  }
}
