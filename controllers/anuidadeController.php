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
                    $data = $_POST['data'];
                    $valor = $_POST['valor'];
                    $this->anuidadeNegocio->registrarAnuidade($data, $valor);
                    header("../views/payment.php");
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
    }
?>