<?php

class DB
{
    public string $host = "localhost";
    public string $dbname = "random_team";
    public string $user = "root";
    public string $password = '1005';
    public PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
    }
}