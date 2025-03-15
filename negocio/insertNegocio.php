<?php
    require_once '../data/insertData.php';
    // Regra de negocio
    class InsertNegocio {
        private $insertData;
        public function __construct() {
            $this->insertData = new InsertData();
        }
        public function registrar($nome, $cpf, $data, $email, $senha) {
            if($this->insertData->verificacao($nome, $email)) {
                throw new Exception("Usuário já cadastrado ao sistema!");
            }
            // Criando o objeto usário da Classe ClientModel
            // Retorna esse usuario, para função registrar(), que 
            // cadastra o usuário ao Banco de Dados.
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $usuario = new UsuariosModel();
            $usuario->setNome($nome);
            $usuario->setCpf($cpf);
            $usuario->setData($data);
            $usuario->setEmail($email);
            $usuario->setSenha($senhaHash);
            return $this->insertData->registrar($usuario);
        }
    }
?>