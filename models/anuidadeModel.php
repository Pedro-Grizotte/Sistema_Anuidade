<?php
    require_once '../configuration/connect.php';

    class AnuidadeModel {
        private $data;
        private $valor;

        public function getData() {
            return $this->data;
        }
        public function setData($data) {
            $this->data = $data;
        }
        public function getValor() {
            return $this->valor;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }
    }
?>