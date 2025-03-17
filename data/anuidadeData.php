<?php
    require_once '../configuration/connect.php';
    require_once '../models/anuidadeModel.php';

    class AnuidadeData {
        private $database;
        public function __construct() {
            $this->database = Connect::getInstance()->getConnection();
        }
        public function registrarAnuidade(AnuidadeModel $anuidade) {
            try {
                $stmt = $this->database->prepare("INSERT INTO Anuidade (Ano, Valor) VALUES (?,?)");
                $stmt->bindValue(1, $anuidade->getData());
                $stmt->bindValue(2, $anuidade->getValor());
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Error ao registrar anuidade: ' . $e->getMessage();
            }
        }
        public function verificacaoAnuidade($data) {
            try {
                $stmt = $this->database->query("SELECT COUNT(*) FROM Anuidade WHERE Ano = '".$data."'");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error ao verificar anuidade: ' . $e->getMessage();
            }
        }
        public function getTotalAnuidades() {
            try {
                $stmt = $this->database->query("SELECT COUNT(*) FROM Anuidade");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo 'Error ao obter total de anuidades: ' . $e->getMessage();
            }
        }
    }
?>