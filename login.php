<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sênior Tech</title>
    <link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="./css/style.css"/>
</head>
<body>
    <!-- Navbar (cabeçalho) -->
    <header id="header" class="transparent-nav">
        <div class="container">
            <!-- ... (código do cabeçalho existente) ... -->
        </div>
    </header>

    <!-- Conteúdo da página de login -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <?php
                        // Processar o formulário de login aqui
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = $_POST["username"];
                            $password = $_POST["password"];

                            // Substitua as credenciais do banco de dados
                            $servername = "localhost";
                            $username_db = "root";
                            $password_db = "";
                            $dbname = "seniortech";

                            // Criar conexão
                            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

                            // Verificar a conexão
                            if ($conn->connect_error) {
                                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                            }

                            // Consulta SQL para verificar o login
                            $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<div class='alert alert-success'>Login bem-sucedido!</div>";
                                header("Location: index.html");
                                exit();
                            } else {
                                echo "<div class='alert alert-danger'>Usuário ou senha inválidos.</div>";
                            }

                            $conn->close();
                        }
                    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="username">Usuário:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Digite seu usuário" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                    <p class="signup-link">Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer id="footer" class="section">
        <div class="container">
            <!-- ... (código do rodapé existente) ... -->
        </div>
    </footer>

    <!-- Preloader e Plugins jQuery -->
    <div id='preloader'><div class='preloader'></div></div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
