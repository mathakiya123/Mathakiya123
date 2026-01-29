<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "mvc_demo";
    public $conn;

    public function getConnection() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }
}
?>