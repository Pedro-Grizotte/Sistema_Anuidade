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
        public function getAnuidade() {
            try {
                $anuidade = $this->usersNegocio->getAnuidade();
                return $anuidade;
            } catch(PDOException $e) {  
                echo "Error: " . $e->getMessage();
            }
        }
        public function getAnuidadesUsuarios($id) {
            try {
                $id = $_SESSION['id'];
                return $this->usersNegocio->getAnuidadeUsuarios($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getAnuidadesDevedoras($id) {
            try {
                $id = $_SESSION['id'];
                return $this->usersNegocio->getAnuidadesDevedoras($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getAnuidadesPagas($id) {
            try {
                $id = $_SESSION['id'];
                return $this->usersNegocio->getAnuidadesPagas($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getCheckout($id) {
            try {
                return $this->usersNegocio->getCheckout($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getHistorico($id) {
            try {
                return $this->usersNegocio->getHistorico($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function pagarBoleto($id) {
            try {
                $this->usersNegocio->pagarBoleto($id);
                header("Location: ../views/userPayment.php");
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getUsuarioStatus($id) {
            try {
                return $this->usersNegocio->getUsuarioStatus($id);    
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>