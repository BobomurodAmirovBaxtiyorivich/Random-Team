<?php

class DB
{
    public $host = "localhost";
    public $dbname = "random_team";
    public $user = "root";
    public $password = 'My$par0l';
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
    }
}