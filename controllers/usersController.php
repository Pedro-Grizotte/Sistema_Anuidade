<?php
    require_once '../negocio/usersNegocio.php';

    class UsersController {
        private $usersNegocio;
        public function __construct() {
            $this->usersNegocio = new UsersNegocio();
        }
        public function getTotalUsers() {
            try {
                return $this->usersNegocio->getTotalUsers('Associados');
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>