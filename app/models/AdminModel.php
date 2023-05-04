<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class AdminModel extends Model
{

  public function getTask($id = 0)
  {
    $result = $this->db->connection->query("SELECT * FROM tasks WHERE id = $id");
    if ($result) {
      $row = $result->fetch_assoc();
      return $row;
    } else {
      die('Error getTask: ' . $this->db->connection->error);
    }
  }

  public function editTask($id, $data)
  {
    $sets = array();
    $data['edited'] = 1;

    foreach ($data as $key => $value) {
      $sets[] = "`" . $this->db->connection->real_escape_string($key) . "`='" . $this->db->connection->real_escape_string($value) . "'";
    }

    $query = "UPDATE tasks SET " . implode(",", $sets) . " WHERE id=" . $this->db->connection->real_escape_string($id);

    if ($this->db->connection->query($query)) {
      return true;
    } else {
      die('Error: ' . $this->db->connection->error);
    }
  }

  public function checkUser($login, $password)
  {
    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $result = $this->db->connection->query($query);
    return $result->num_rows;
  }
}
