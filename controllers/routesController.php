<?php
    class routesController {
        public function index() {
            require '../views/index.php';
        }
        public function admin() {
            require '../views/admin.php';
        }
        public function login() {
            require '../views/client.php';
        }
        public function paymentsAdmin() {
            require '../views/payments.php';
        }
        public function payments() {
            require '../views/userPayment.php';
        }
    }
?>