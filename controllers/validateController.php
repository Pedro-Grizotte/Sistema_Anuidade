<?php
    require_once '../negocio/validateNegocio.php';
    // Recebe os parametros da view
    class ValidateController {
        private $validateNegocio;
        public function __construct() {
            $this->validateNegocio = new ValidateNegocio();
        }
        public function validacao() {
            try {
                // Recebe os dados do formulario
                // Envia esses dados para a authenticação pela função
                // authenticate() na camada de Negocio.
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    if($this->validateNegocio->authenticacao($email, $senha)) {
                        // Se a autenticação for bem sucedida, redireciona para
                        // a página de client.php
                        $user = $this->validateNegocio->getUserByEmail($email);
                        session_start();
                        $_SESSION['id'] = $user['IDAssociados'];
                        $_SESSION['nome'] = $user['Nome'];
                        if ($email == 'admin@gmail.com') {
                            header("Location: ../views/admin.php");
                        } else {
                            header("Location: ../views/client.php?nome=" . urlencode($user['Nome']));
                        }
                        
                    } else {
                        // Se a autenticação falhar, redireciona para a página de login.php
                        echo "Credenciais inválidas";
                    }
                }
            } catch(PDOException $e) {
                echo 'Credenciais inválidas: ' . $e->getMessage();
            }
        }
    }
?>