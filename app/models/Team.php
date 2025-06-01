<?php
class Team {
    public $conn;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getBestTeam() {
        $query = "SELECT name FROM teams ORDER BY points DESC LIMIT 1";
        return $this->conn->query($query)->fetchColumn();
    }

    public function getBestPlayer() {
        $query = "SELECT best_player FROM teams ORDER BY points DESC LIMIT 1";
        return $this->conn->query($query)->fetchColumn();
    }

    public function getPlayerAgainstTeam($teamName) {
        $stmt = $this->conn->prepare("SELECT best_player FROM teams WHERE name = ?");
        $stmt->execute([$teamName]);
        return $stmt->fetchColumn() ?: "Brak danych o tej drużynie.";
    }

    public function getAllTeams() {
        $query = "SELECT name FROM teams";
        return $this->conn->query($query)->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>
