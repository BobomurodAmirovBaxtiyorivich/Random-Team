<?php

require 'DB.php';
class Random_Team
{
    public $query;
    public $stmt;
    public $conn;

    public function __construct()
    {
        $pdo = new DB();

        $this->conn = $pdo->conn;
    }

    public function store($full_name): bool
    {
        $this->query = "INSERT INTO random_team(full_name) VALUES(:full_name)";

        return $this->conn->prepare($this->query)->execute([
            ':full_name' => $full_name
        ]);
    }

    public function get(): array
    {
        $this->query = "SELECT * FROM random_team ORDER BY id DESC";
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Delete($id): bool
    {
        $this->query = "DELETE FROM random_team WHERE id = :id";
        return $this->conn->prepare($this->query)->execute([
            ':id' => $id
        ]);
    }
}