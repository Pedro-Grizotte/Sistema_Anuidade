<?php
    require_once '../configuration/connect.php';
    class UsuariosModel {
        // Minha classe usuário representa a entidade Associados na documentação

        private $id;
        private $nome;
        private $cpf;
        private $ano;
        private $email;
        private $senha;

        public function getID() {
            return $this->id;
        }
        public function setID($id) {
            $this->id = $id;
        }
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
        public function getAno() {
            return $this->ano;
        }
        public function setAno($ano) {
            $this->ano = $ano;
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

        // Validação de usuário abaixo

        private $validacao_email;
        private $validacao_senha;

        function getValidacao_email() {
            return $this->validacao_email;
        }
        function setValidacao_email($validacao_email) {
            $this->validacao_email = $validacao_email;
        }
        function getValidacao_senha() {
            return $this->validacao_senha;
        }
        function setValidacao_senha($validacao_senha) {
            $this->validacao_senha = $validacao_senha;
        }
    }
?>