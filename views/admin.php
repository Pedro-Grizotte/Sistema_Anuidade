<?php
    require_once '../configuration/routes.php';
    require_once '../controllers/usersController.php';
    $routes = new RoutesController();
    $controller = new UsersController();    
    $users = $controller->getUsers();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/style_gestor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-icon active" data-tooltip="Home">
                <a href="./admin.php" class="home-icon"><ion-icon name="home-outline"></ion-icon></a>
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
                    <?php echo $routes->getTotalUsers(); ?>
                  </div>
                </div>
                <div class="stat-card">
                  <h3>Anuidades</h3>
                  <div class="stat-value">
                    <?php echo $routes->getTotalAnuidades(); ?>
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
                            <?php if(!empty($users)): ?>
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user['ID']); ?></td>
                                        <td><?php echo htmlspecialchars($user['NOME']); ?></td>
                                        <td><?php echo htmlspecialchars($user['CPF']); ?></td>
                                    </tr>
                                <?php  endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">Nenhum associado encontrado.</td>
                                </tr>
                            <?php endif; ?>
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