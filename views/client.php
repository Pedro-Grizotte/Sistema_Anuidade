<?php
    session_start();
    require_once '../controllers/usersController.php';
    $controller = new UsersController();
    $id = $_SESSION['id'];
    $nome = $_SERVER['nome'];
    $controller->getAnuidadesUsuarios($id);
    $controller->getAnuidadesDevedoras($id);
    $anuidades = $controller->getAnuidade();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/style_user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-icon active" data-tooltip="Home">
                <a href="./client.php" class="home-icon"><ion-icon name="home-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Payments">
                <a href="./userPayment.php"><ion-icon name="card-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Settings">
                <a href=""><ion-icon name="settings-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Help">
                <a href=""><ion-icon name="information-circle-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Logout">
                <a href="../public/index.php"><ion-icon name="close-outline"></ion-icon></a>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1><?php echo $_SESSION['nome']; ?></h1>
                <div class="search-bar">
                    <span>🔍</span>
                    <input type="text" placeholder="Search" />
                </div>
            </div>

            <div class="stats">
                <div class="stat-card">
                  <h3>Anuidades</h3>
                  <div class="stat-value">
                    <?php echo $controller->getAnuidadesUsuarios($id); ?>
                  </div>
                </div>
                <div class="stat-card">
                  <h3>Anuidades Devedoras</h3>
                  <div class="stat-value">
                    <?php echo $controller->getAnuidadesDevedoras($id); ?>
                  </div>
                </div>
            </div>

            <section class="chart-container">
                
            </section>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>