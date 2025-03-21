<?php
    require_once '../controllers/insertController.php';
    require_once '../controllers/anuidadeController.php';
    require_once '../controllers/usersController.php';
    require_once '../controllers/validateController.php';
    class RoutesController {
        public function index() {
            require '../views/login.php';
        }
        public function admin() {
            require '../views/admin.php';
        }
        public function client() {
            require '../views/client.php';
        }
        public function userPayment() {
            require '../views/userPayment.php';
        }
        public function paymentsPage() {
            require '../views/payments.php';
        }
        public function login() {
            $validacao = new ValidateController();
            $validacao->validacao();
        }
        public function register() {
            $insert = new InsertController();
            $insert->registrar();
        }
        public function getAnuidadesUsuarios($id) {
            $usuarios = new UsersController();
            echo $usuarios->getAnuidadesUsuarios($id);
        }
        public function getAnuidadesDevedoras($id) {
            $usuarios = new UsersController();
            echo $usuarios->getAnuidadesDevedoras($id);
        }
        public function getTotalUsers() {
            $usuario = new UsersController();
            echo $usuario->getTotalUsers();
        }
        public function getTotalAnuidades() {
            $anuidades = new AnuidadeController();
            echo $anuidades->getTotalAnuidades();
        }
        public function paymentsAdmin() {
            require '../views/payments.php';
        }
        public function payments() {
            require '../views/userPayment.php';
        }
    }
?>