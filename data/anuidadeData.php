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
                $stmt->bindValue(1, $anuidade->getAno());
                $stmt->bindValue(2, $anuidade->getValor());
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Error ao registrar anuidade: ' . $e->getMessage();
            }
        }
        public function verificacaoAnuidade($ano) {
            try {
                $stmt = $this->database->query("SELECT COUNT(*) FROM Anuidade WHERE Ano = '".$ano."'");
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
        public function getAnuidade() {
            try {
                $stmt = $this->database->query("SELECT * FROM Anuidade");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error ao obter anuidade: ' . $e->getMessage();
            }
        }
        public function editAnuidade($valor, $ano) {
            try {
                $stmt = $this->database->prepare("UPDATE Anuidade SET Valor = ? WHERE Ano = ?");
                $stmt->bindValue(1, $valor);
                $stmt->bindValue(2, $ano);
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Error ao editar anuidade: ' . $e->getMessage();
            }
        }
        public function deleteAnuidade($id) {
            try {
                $stmt = $this->database->prepare("DELETE FROM Anuidade WHERE IDAnuidade = ".$id."");
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Error ao deletar anuidade: ' . $e->getMessage();
            }
        }
        public function processarAnuidades($data) {
            try {
                $stmt = $this->database->prepare("INSERT into Anuidade (Ano, Valor) VALUES ()");
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Error ao processar anuidades: ' . $e->getMessage();
            }
        }
    }
?>