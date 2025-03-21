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
        public function getAnuidade() {
            try {
                $stmt = $this->database->query("SELECT * FROM Anuidade");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                return [];
            }
        }
        public function getAnuidadesUsuario($id) {
            try {
                $stmt = $this->database->query("select count(AssociadoID) from AnuidadeAssociados where AssociadoID = ".$id."");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function getAnuidadesDevedoras($id) {
            try {
                $stmt = $this->database->query("select count(AssociadoID) from AnuidadeAssociados where AssociadoID = ".$id." and Pago = 0");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function getAnuidadesPagas($id) {
            try {
                $stmt = $this->database->query("select count(AssociadoID) from AnuidadeAssociados where AssociadoID = ".$id." and Pago = 1");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function getCheckout($id) {
            try {
                $stmt = $this->database->query("
                    select AA.IDAnuidadeAssociados, AA.Ano, A.Valor, AA.Pago
                    from AnuidadeAssociados as AA
                    join Anuidade as A on A.Ano = AA.Ano
                    where AssociadoID = ".$id." && Pago = 0
                ");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function getHistorico($id) {
            try {
                $stmt = $this->database->query("
                    select AA.Ano, A.Valor, AA.Pago
                    from AnuidadeAssociados as AA
                    join Anuidade as A on A.Ano = AA.Ano
                    where AssociadoID = ".$id." && Pago = 1
                ");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function pagarBoleto($id) {
            try {
                $stmt = $this->database->prepare("UPDATE AnuidadeAssociados SET Pago = 1 WHERE AssociadoID = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
?>