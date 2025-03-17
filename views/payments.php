<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/style_anuidades.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-icon active" data-tooltip="Home">
                <a href="./admin.php" class="home-icon"><ion-icon name="home-outline"></ion-icon></a>
            </div>
            <div class="sidebar-icon" data-tooltip="Payments">
                <a href="#"><ion-icon name="card-outline"></ion-icon></a>
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
                            <input type="date" name="data"required>
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
                                <th scope="col">Data</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Ainda em Pendência -->
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