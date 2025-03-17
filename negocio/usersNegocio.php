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
    }
?>