<?php
    require_once '../configuration/connect.php';
    class ValidateData {
        private $database;
        public function __construct() {
            $this->database = Connect::getInstance()->getConnection();
        }
        public function validateLogin($email) {
            try {
                // Querry que busca o usuário no banco de dados
                $stmt = $this->database->prepare("SELECT * FROM Associados WHERE Email = ?");
                $stmt->bindValue(1, $email);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                return false;
            }
        }
        public function getUserByEmail($email) {
            try {
                $stmt = $this->database->prepare("SELECT * FROM Associados WHERE Email = ?");
                $stmt->bindValue(1, $email);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                return false;
            }
        }
    }
?>