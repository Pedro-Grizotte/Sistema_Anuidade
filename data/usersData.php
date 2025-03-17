<?php
    require_once '../configuration/connect.php';

    class UsersData {
        private $database;
        public function __construct() {
            $this->database = Connect::getInstance()->getConnection();
        }
        public function getTotalUsers($users) {
            try {
                $stmt = $this->database->query("SELECT COUNT(*) FROM Associados");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
?>