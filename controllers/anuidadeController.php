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
                    header("http://localhost/PHP/Projetos/Sistema_Anuidade/views/payments.php");
                    return $this->anuidadeNegocio->registrarAnuidade($ano, $valor);
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

        public function editAnuidade() {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ano = (int)$_POST['Ano'];
                    $valor = (int)$_POST['Valor'];
                    return $this->anuidadeNegocio->editAnuidade($ano, $valor);
                }
            } catch(PDOException $e) {  
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>