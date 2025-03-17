<?php
    require_once '../controllers/usersController.php';
    require_once '../controllers/anuidadeController.php';
    $controller = new usersController();
    $anuidadeController = new anuidadeController();
    session_start();
    $controller->getTotalUsers();
    $controller->getUsers();
    $anuidadeController->getTotalAnuidades();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/style_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-icon active" data-tooltip="Home">
                <a href="./client.php" class="home-icon"><ion-icon name="home-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Payments">
                <a href="./payments.php"><ion-icon name="card-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Settings">
                <a href=""><ion-icon name="settings-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Help">
                <a href=""><ion-icon name="information-circle-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Logout">
                <ion-icon name="close-outline"></ion-icon>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Bem vindo <?php echo $_SESSION['nome'];?>!</h1>
                <div class="search-bar">
                    <span>🔍</span>
                    <input type="text" placeholder="Search" />
                </div>
            </div>

            <div class="stats">
                <div class="stat-card">
                  <h3>Total de Associados</h3>
                  <div class="stat-value">
                    <?php echo $controller->getTotalUsers(); ?>
                  </div>
                </div>
                <div class="stat-card">
                  <h3>Anuidades</h3>
                  <div class="stat-value">
                    <?php echo $anuidadeController->getTotalAnuidades(); ?>
                  </div>
                </div>
            </div>

            <div class="chart-container">
                <div class="container my-5">
                    <h2>Lista de Associados</h2>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Inadimplente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $users = [
                                    ['id' => 1, 'nome' => 'Pedro Henrique Carvalho Grizotte', 'cpf' => '017.551.036-97'],
                                    ['id' => 2, 'nome' => 'Ana Carolina da Silva Germano', 'cpf' => '152.025.056-80'],
                                    ['id' => 3, 'nome' => 'admin', 'cpf' => '000.000.000-00']
                                ];

                                if (!empty($users)) {
                                    foreach ($users as $user) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($user['id']) . '</td>';
                                        echo '<td>' . htmlspecialchars($user['nome']) . '</td>';
                                        echo '<td>' . htmlspecialchars($user['cpf']) . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Nenhum usuário encontrado.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>