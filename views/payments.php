<?php
    session_start();
    require_once '../controllers/anuidadeController.php';
    require_once '../configuration/routes.php';

    $controller = new AnuidadeController();
    $routes = new RoutesController();
    $anuidades = $controller->getAnuidade();
    $id = null;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if(isset($_POST['submit'])) {
            $routes->registrarAnuidades();
        } elseif (isset($_POST['submit_edit'])) {
            if (isset($_POST['ano']) && isset($_POST['valor'])) {
                $ano = $_POST['ano'];
                $valor = $_POST['valor'];
                $routes->editarAnuidades($valor, $ano);
            } else {
                echo "Dados insuficientes!";
            }
        } else {
            if ($id != null) {
                $routes->deletarAnuidades($id);
            } else {
                echo "Id não fornecidos";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/anuidades.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-icon active" data-tooltip="Home">
                <a href="../views/admin.php" class="home-icon"><ion-icon name="home-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Payments">
                <a href="../views/payments.php"><ion-icon name="card-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Settings">
                <a href=""><ion-icon name="settings-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Help">
                <a href=""><ion-icon name="information-circle-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Logout">
                <a href="/"><ion-icon name="close-outline"></ion-icon></a>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Anuidades</h1>
                <div class="search-bar">
                    <span>🔍</span>
                    <input type="text" placeholder="Search" />
                </div>
            </div>
            <div class="chart-container">
                <div class="form-box anuidade">
                    <form action="" method="POST">
                        <h2>Registrar Anuidade</h2>
                        <div class="input-box">
                            <input type="number" name="ano" placeholder="Ano" required>
                            <i><ion-icon name="calendar-number"></ion-icon></i>
                        </div>
                        <div class="input-box">
                            <input type="number" name="valor" placeholder="valor" required>
                            <i><ion-icon name="logo-usd"></ion-icon></i>
                        </div>
                        <button type="submit" name="submit" class="btn_anuidade">Registrar</button>
                    </form>
                </div>
                <hr>
                <div class="container my-5">
                    <h2>Lista de Anuidades</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ano</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $anuidades = $controller->getAnuidade(); ?>
                            <?php if(!empty($anuidades)): ?>
                                <?php foreach($anuidades as $anuidade): ?>
                                    <tr>
                                        <td><?php echo $anuidade['IDAnuidade']; ?></td>
                                        <td><?php echo htmlspecialchars($anuidade['Ano']); ?></td>
                                        <td><?php echo "R$ " . htmlspecialchars($anuidade['Valor']); ?></td>
                                        <td>
                                            <form action="" method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $anuidade['IDAnuidade']; ?>">
                                                <input type="hidden" name="ano" value="<?php echo $anuidade['Ano']; ?>">
                                                <input type="number" name="valor" placeholder="Valor: " style="
                                                    display: inline;
                                                    padding: 1px;
                                                    width: 150px;
                                                    border-radius: 5px;
                                                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                                                    transition: all 0.3s ease;
                                                    border: 2px solid transparent;
                                                " required>
                                                <button type="submit" name="submit_edit" class="btn btn-outline-success btn-sm">Editar</button>
                                            </form>
                                            <form action="" method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $anuidade['IDAnuidade']; ?>">
                                                <input type="number" name="ano" value="<?php echo $anuidade['Ano']; ?>" style="display: none;">
                                                <button type="submit" name="submit_delete" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>                                       
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">Nenhuma anuidade encontrada</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="overlay"></div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script src="../wwwroot/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>