<?php 
    require_once '../negocio/anuidadeNegocio.php';

    class AnuidadeController {
        private $anuidadeNegocio;
        public function __construct() {
            $this->anuidadeNegocio = new AnuidadeNegocio();
        }
        public function registrarAnuidade() {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ano = $_POST['ano'];
                    $valor = $_POST['valor'];
                    session_start();
                    if ($this->anuidadeNegocio->registrarAnuidade($ano, $valor)) {
                        header("../views/payments.php");
                    } else {
                        echo "Error ao registrar Anuidade";
                    }
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getTotalAnuidades() {
            try {
                return $this->anuidadeNegocio->getTotalAnuidades();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getAnuidade() {
            try {
                $anuidade = $this->anuidadeNegocio->getAnuidade();
                return $anuidade;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>