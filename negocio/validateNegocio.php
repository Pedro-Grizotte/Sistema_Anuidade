<?php
    require_once '../data/validateData.php';
    class ValidateNegocio {
        private $validateData;
        public function __construct() {
            $this->validateData = new ValidateData();
        }
        public function authenticacao($email, $senha) {
            // Recebe os dados da controller, e faz a verificação se
            // o usuário existe e se a senha está correta
            $login = $this->validateData->validateLogin($email);
            if ($login && password_verify($senha, $login['Senha'])) {
                return true;
            }
            return false;
        }
        public function getUserByEmail($email) {
            // Recebe o email da controller, e busca o usuário
            return $this->validateData->getUserByEmail($email);
        }
    }
?>