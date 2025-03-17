<?php
    require_once '../negocio/usersNegocio.php';

    class UsersController {
        private $usersNegocio;
        public function __construct() {
            $this->usersNegocio = new UsersNegocio();
        }
        public function getTotalUsers() {
            try {
                return $this->usersNegocio->getTotalUsers();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getUsers() {
            try {
                $users = $this->usersNegocio->getUsers(); 
                return $users;   
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>