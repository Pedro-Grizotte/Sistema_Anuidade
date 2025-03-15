<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Anuidade</title>
    <link rel="stylesheet" href="../wwwroot/css/style.css">
</head>
<body>
    <header>
        <h2 class="logo">Sistema de Anuidade</h2>
        <nav class="navigation">
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>
    <main>
        <div class="wrapper">
            <span class="icon-close">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <div class="form-box login">
                <h2>Login</h2>
                <form action="" method="POST">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" value="test" name="senha" required>
                        <label>Senha</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="checkbox">Lembre de mim</label>
                        <a href="#">Esqueceu a senha?</a>
                    </div>
                    <button type="submit" class="btn_login">Login</button>
                    <div class="login-register">
                        <p>Não possui uma conta? 
                            <a href="#" class="register-link">Registrar</a>
                        </p>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <h2>Registration</h2>
                <form action="index.php" method="POST">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" name="nome" required>
                        <label>Nome</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="man"></ion-icon></span>
                        <input type="text" name="cpf" required>
                        <label>CPF</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="calendar-number"></ion-icon></span>
                        <input type="date" name="data" required>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="senha" required>
                        <label>Senha</label>
                    </div>
                    <button type="submit" name="submit" class="btn_register">Registrar</button>
                    <div class="login-register">
                        <p>Já possui uma conta? 
                            <a href="#" class="login-link">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../wwwroot/js/site.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>