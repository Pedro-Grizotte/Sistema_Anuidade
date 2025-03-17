<?php
    require_once '../data/anuidadeData.php';

    class AnuidadeNegocio {
        private $anuidadeData;
        public function __construct() {
            $this->anuidadeData = new AnuidadeData();
        }
        public function registrarAnuidade($data, $valor) {
            if($this->anuidadeData->verificacaoAnuidade($data)) {
                throw new Exception("Anuidade já registrada no sistema!");
            }
            $anuidade = new AnuidadeModel();
            $anuidade->setData($data);
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
    }
?>