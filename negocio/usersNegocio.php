<?php
    require_once '../data/usersData.php';

    class UsersNegocio {
        private $usersData;
        public function __construct() {
            $this->usersData = new UsersData();
        }
        public function getTotalUsers() {
            return $this->usersData->getTotalUsers();
        }
        public function getUsers() {
            return $this->usersData->getUsers();
        }
        public function getAnuidade() {
            return $this->usersData->getAnuidade();
        }
        public function getAnuidadeUsuarios($id) {
            return $this->usersData->getAnuidadesUsuario($id);
        }
        public function getAnuidadesDevedoras($id) {
            return $this->usersData->getAnuidadesDevedoras($id);
        }
    }
?>