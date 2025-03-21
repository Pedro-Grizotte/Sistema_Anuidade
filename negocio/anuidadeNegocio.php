<?php
    require_once '../data/anuidadeData.php';

    class AnuidadeNegocio {
        private $anuidadeData;
        public function __construct() {
            $this->anuidadeData = new AnuidadeData();
        }
        public function registrarAnuidade($ano, $valor) {
            if($this->anuidadeData->verificacaoAnuidade($ano)) {
                throw new Exception("Anuidade já registrada no sistema!");
            }
            $anuidade = new AnuidadeModel();
            $anuidade->setAno($ano);
            $anuidade->setValor($valor);
            return $this->anuidadeData->registrarAnuidade($anuidade);
        }
        public function getTotalAnuidades() {
            try {
                return $this->anuidadeData->getTotalAnuidades();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getAnuidade() {
            try {
                return $this->anuidadeData->getAnuidade();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function editAnuidade($valor, $ano) {
            try {
                return $this->anuidadeData->editAnuidade($valor, $ano);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function deleteAnuidade($id) {
            try {
                return $this->anuidadeData->deleteAnuidade($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function processarAnuidades($id) {
            try {
                return $this->anuidadeData->processarAnuidades($id);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>