<?php
    require_once '../models/usuariosModel.php';
    require_once '../configuration/connect.php';
    class InsertData {
        private $database;
        public function __construct() {
            $this->database = Connect::getInstance()->getConnection();
        }
        public function registrar(UsuariosModel $usuario) {
            try {
                // Realiza o insert do usuário ao Banco de dados.
                $stmt = $this->database->prepare("INSERT INTO Associados (Nome, CPF, DataFiliacao, Email, Senha) VALUES (?,?,?,?,?)");
                $stmt->bindValue(1, $usuario->getNome());
                $stmt->bindValue(2, $usuario->getCpf());
                $stmt->bindValue(3, $usuario->getData());
                $stmt->bindValue(4, $usuario->getEmail());
                $stmt->bindValue(5, $usuario->getSenha());
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Erro ao registrar o usuário: " . $e->getMessage();
            }
        }
        public function verificacao($nome, $email) {
            try {
                // Função de verificação se o usuário já existe
                // no Banco de dados.
                $stmt = $this->database->query("SELECT COUNT(*) FROM Associados WHERE Nome = '".$nome. "' OR Email  = '".$email. "'");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo "Erro ao verificar se o usuário existe: " . $e->getMessage();
            }
        }
    }
?>