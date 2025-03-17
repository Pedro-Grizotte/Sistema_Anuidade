<?php
    require_once '../configuration/connect.php';

    class UsersData {
        private $database;
        public function __construct() {
            $this->database = Connect::getInstance()->getConnection();
        }
        public function getTotalUsers() {
            try {
                $stmt = $this->database->query("SELECT COUNT(*) FROM Associados");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function getUsers() {
            try {
                $stmt = $this->database->query("SELECT IDAssociados AS ID, NOME, CPF FROM Associados");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                return [];
            }
        }
    }
?>