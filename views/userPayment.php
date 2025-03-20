<?php
    require_once '../controllers/usersController.php';
    require_once '../controllers/anuidadeController.php';
    session_start();
    $controller = new UsersController();
    $id = $_SESSION["id"];
    $checkouts = $controller->getCheckout($id);
    $historicos = $controller->getHistorico($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/style_userPayments.css">
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
                <h1><?php echo $_SESSION["nome"]; ?></h1>
                <div class="search-bar">
                    <span>🔍</span>
                    <input type="text" placeholder="Search" />
                </div>
            </div>

            <div class="stats">
                <div class="stat-card">
                    <h3>Anuidades Pagas</h3>
                    <div class="stat-value">
                        <?php echo $controller->getAnuidadesPagas($id); ?>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <div class="container my-5">
                    <h2>Histórico</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Ano</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($historicos)): ?>
                                <?php foreach($historicos as $historico): ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $historico["Ano"]; ?></td>
                                        <td><?php echo $historico["Valor"]; ?></td>
                                        <td class="coluna-historico"><?php $historico["Pago"]; ?>Pago</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">Nenhum histórico encontrado.</td>
                                </tr> 
                            <?php endif; ?>  
                        </tbody>
                    </table>
                </div>

                <div class="container my-5">
                    <h2>Checkout</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Ano</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($checkouts)): ?>
                                <form action="" method="POST">
                                    <?php foreach($checkouts as $checkout): ?>
                                        <tr>
                                            <td><input type="checkbox" class="get-value" value="boleto"></td>
                                            <td><?php echo $checkout['Ano']; ?></td>
                                            <td><?php echo $checkout['Valor']; ?></td>
                                            <td class="coluna-checkout"><?php $checkout['Pago']; ?>Expirado</td>
                                        </tr> 
                                    <?php endforeach; ?>
                                    <button type="submit" onclick="gerarBoleto()" class="btn btn-danger btn-sm" style="float: right;">Gerar Boleto</button>
                                </form>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">Nenhum registro encontrado</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="checkout-total">
                    <form action="" method="POST">
                        <div class="checkout-box">
                            <h2>Total</h2>
                            <p>Valor total: R$ 650,00</p>
                            <button type="submit" class="btn_pagar">Pagar Boleto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script src="../wwwroot/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>