<?php 
    require_once '../negocio/anuidadeNegocio.php';

    class AnuidadeController {
        private $anuidadeNegocio;
        public function __construct() {
            $this->anuidadeNegocio = new AnuidadeNegocio();
        }
        public function registrarAnuidade() {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                    $ano = $_POST['ano'];
                    $valor = $_POST['valor'];
                    $this->anuidadeNegocio->registrarAnuidade($ano, $valor);
                    header("Location: ../views/payments.php");
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

        public function editAnuidade($valor, $ano) {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    return $this->anuidadeNegocio->editAnuidade($valor, $ano);
                }
            } catch(PDOException $e) {  
                echo "Error: " . $e->getMessage();
            }
        }
        public function deleteAnuidade($id) {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->anuidadeNegocio->deleteAnuidade($id);
                    header("Location: ../views/payments.php");
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function processarAnuidades($id) {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->anuidadeNegocio->processarAnuidades($id);
                    header("Location: ../views/userPayment.php");
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>