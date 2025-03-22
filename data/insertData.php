<?php
    require_once '../models/usuariosModel.php';
    require_once '../models/anuidadeModel.php';
    require_once '../configuration/connect.php';
    class InsertData {
        private $database;
        public function __construct() {
            $this->database = Connect::getInstance()->getConnection();
        }
        public function registrar(UsuariosModel $usuario) {
            try {
                // Realiza o insert do usuário ao Banco de dados.
                $stmt = $this->database->prepare("INSERT INTO Associados (Nome, CPF, DataFiliacao, Email, Senha) VALUES (?,?,?,?,?)");
                $stmt->bindValue(1, $usuario->getNome());
                $stmt->bindValue(2, $usuario->getCpf());
                $stmt->bindValue(3, $usuario->getAno());
                $stmt->bindValue(4, $usuario->getEmail());
                $stmt->bindValue(5, $usuario->getSenha());
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Erro ao registrar o usuário: " . $e->getMessage();
            }
        }
        public function verificacao($nome, $email) {
            try {
                // Função de verificação se o usuário já existe
                // no Banco de dados.
                $stmt = $this->database->query("SELECT COUNT(*) FROM Associados WHERE Nome = '".$nome. "' OR Email  = '".$email. "'");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo "Erro ao verificar se o usuário existe: " . $e->getMessage();
            }
        }
        public function registrarAnuidades(UsuariosModel $usuario) {
            try {
                $dataFiliacao = $usuario->getAno();
                $dataAtual = date('Y');
                $diferenca = $dataAtual - $dataFiliacao;

                for ($i = 0; $i < $diferenca; $i++) {
                    $anuidade = new AnuidadeModel();
                    $anuidade->setAno($dataFiliacao + $i);
                    $anuidade->setValor(100);

                    $this->registrarAnuidadesAssociado($usuario, $anuidade);
                }
            } catch(PDOException $e) {
                echo "Erro ao registrar anuidades: " . $e->getMessage();
            }
        }
        public function registrarAnuidadesAssociado(UsuariosModel $usuario, AnuidadeModel $anuidade) {
            try {
                if (!$this->verificarAnuidade($anuidade->getAno())) {
                    $this->registrarAnuidade($anuidade);
                }
                $stmt = $this->database->prepare("INSERT INTO AnuidadeAssociados (AssociadoID, Ano, Pago) VALUES (?,?,?)");
                $stmt->bindValue(1, $usuario->getAno());
                $stmt->bindValue(2, 0);
                $stmt->execute();
            } catch(PDOException $e) {  
                echo "Erro ao registrar anuidades: " . $e->getMessage();
            }
        }
        public function verificarAnuidade($ano) {
            try {
                $stmt = $this->database->query("SELECT COUNT(*) FROM Anuidade WHERE Ano = '".$ano."'");
                return $stmt->fetchColumn();
            } catch(PDOException $e) {
                echo "Erro ao verificar anuidade: " . $e->getMessage();
            }
        }
        public function registrarAnuidade(AnuidadeModel $anuidade) {
            try {
                $stmt = $this->database->prepare("INSERT INTO Anuidade (Ano, Valor) VALUES (?,?)");
                $stmt->bindValue(1, $anuidade->getAno());
                $stmt->bindValue(2, $anuidade->getValor());
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Erro ao registrar anuidade: " . $e->getMessage();
            }
        }
    }
?>