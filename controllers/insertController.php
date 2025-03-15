<?php
    require_once '../negocio/insertNegocio.php';
    // Recebe os parametros da view
    class InsertController {
        private $insertNegocio;
        public function __construct() {
            $this->insertNegocio = new InsertNegocio();
        }
        public function registrar() {
            try {
                // Recebe os dados do formulário
                // Envia esses dados para registrar() na camada negocios
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nome = $_POST['nome'];
                    $cpf = $_POST['cpf'];
                    $data = $_POST['data'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $this->insertNegocio->registrar($nome, $cpf, $data, $email, $senha);
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>