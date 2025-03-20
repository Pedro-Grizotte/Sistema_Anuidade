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
                    header("http://localhost/PHP/Projetos/Sistema_Anuidade/views/payments.php");
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
                    $valor = (int)$_POST['Valor'];
                    $ano = (int)$_POST['Ano'];
                    return $this->anuidadeNegocio->editAnuidade($valor, $ano);
                }
            } catch(PDOException $e) {  
                echo "Error: " . $e->getMessage();
            }
        }
        public function deleteAnuidade($id) {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_delete"])) {
                    $id = $_POST["submit_delete"];
                    $this->anuidadeNegocio->deleteAnuidade($id);
                    header("http://localhost/PHP/Projetos/Sistema_Anuidade/views/payments.php");
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>