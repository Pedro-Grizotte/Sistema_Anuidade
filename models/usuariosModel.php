<?php
    require_once '../configuration/connect.php';
    class UsuariosModel {
        // Minha classe usuário representa a entidade Associados na documentação

        private $nome;
        private $cpf;
        private $data;
        private $email;
        private $senha;

        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getCpf() {
            return $this->cpf;
        }
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }
        public function getData() {
            return $this->data;
        }
        public function setData($data) {
            $this->data = $data;
        }
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function getSenha() {
            return $this->senha;
        }
        public function setSenha($senha) {
            $this->senha = $senha;
        }
    }
?>