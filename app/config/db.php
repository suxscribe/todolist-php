<?
if (!defined("ACCESS")) {
  die("Access Denied!");
}

class DBConn
{
  private $host = "localhost";
  private $user = "user";
  private $database = "database";
  private $password = "password";
  public $connection;

  public function __construct()
  {
    $this->connect();
  }

  private function connect()
  {
    $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

    if ($this->connection->connect_error) {
      die('Connection failed: ' . $this->connection->connect_error);
    }
  }
}

$connection = new DBConn();
