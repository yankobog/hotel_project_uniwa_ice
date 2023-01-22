<?php
  // DB Connection
  $con = mysqli_connect("localhost","root","","hotel_db");
 
  // Check connection
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
  class db
  {
    private $connection = null;

    public function __construct()
    {
      $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function others($query)
    {
      $result = @mysqli_query($this->connection, $query);
      return $result;
    }

    private function query($query)
    {
      $dbQuery = mysql_query($query);
      return $dbQuery;
    }

    public function get_row($query)
    {
      $result = $this->connection->query($query);
      $row = $result->fetch_assoc();
      return $row;
    }

    public function is_empty($query)
    {
      $result = $this->connection->query($query);
      if ($result == false)
      {
        return false;
      }
      return true;
    }

    public function get_multi_row($query)
    {
      $rows = array();
      $result = @mysqli_query($this->connection, $query);
      while ($row = $result->fetch_assoc())
      {
        $rows[] = $row;
      }
      return $rows;
    }

    public function db_close()
    {
      mysqli_close($this->connection);
    }

  }
?>