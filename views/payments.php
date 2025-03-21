<?php
    session_start();
    require_once '../controllers/anuidadeController.php';
    $controller = new AnuidadeController();
    $controller->registrarAnuidade();
    $controller->editAnuidade();
    $anuidades = $controller->getAnuidade();
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
                    <form action="./payments.php" method="POST">
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
                                            <button id="editBtn" onclick="openEditPopup()" class="btn btn-outline-success btn-sm turned-button">Editar</button>
                                            <button id="deleteBtn" onclick="openDeletePopup()" class="btn btn-danger btn-sm">Excluir</button>
                                            <div id="editPopup" style="display: none;">
                                                <span class="icon-close">
                                                    <ion-icon name="close-outline" onclick="closeEditPopup()"></ion-icon>
                                                </span>
                                                <div class="form-box edit">
                                                    <form class="formulario-box" action="" method="POST">

                                                    </form>
                                                </div>
                                            </div>
                                            <div id="deletePopup" style="display: none;">
                                                <span class="icon-close">
                                                    <ion-icon name="close-outline" onclick="closeDeletePopup()"></ion-icon>
                                                </span>
                                                <div class="form-box delete">
                                                    <form class="formulario-box" action="" method="POST">
                                                        <h2>Excluir Anuidade</h2>
                                                        <input type="hidden" name="action" value="deleteAnuidade">
                                                        <input type="number" name="idexclusao" value="<?php echo $anuidade["IDAnuidade"] ?>">
                                                        <button type="submit" name="submit_delete" class="btn_excluir">Excluir</button>
                                                    </form>
                                                </div>
                                            </div> 
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