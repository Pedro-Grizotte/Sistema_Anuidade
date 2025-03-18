<?php
    require_once '../configuration/connect.php';

    class AnuidadeModel {
        private $ano;
        private $valor;

        public function getAno() {
            return $this->ano;
        }
        public function setAno($ano) {
            $this->ano = $ano;
        }
        public function getValor() {
            return $this->valor;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }
    }
?>