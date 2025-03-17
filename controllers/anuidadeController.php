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
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>