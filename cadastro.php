<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro - Sênior Tech</title>
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

    <!-- Conteúdo da página de cadastro -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="signup-form">
                    <h2>Cadastro</h2>
                    <?php
                        // Processar o formulário de cadastro aqui
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $birthdate = $_POST["birthdate"];

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

                            // Consulta SQL para inserir um novo usuário
                            $sql = "INSERT INTO usuarios (username, password, name, email, birthdate) 
                                    VALUES ('$username', '$password', '$name', '$email', '$birthdate')";

                            if ($conn->query($sql) === TRUE) {
                                echo "<div class='alert alert-success'>Cadastro bem-sucedido!</div>";
                                
                            } else {
                                echo "<div class='alert alert-danger'>Erro no cadastro: " . $conn->error . "</div>";
                            }

                            $conn->close();
                        }
                    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Usuário:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Digite seu usuário" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="acceptTerms"> Aceito os termos e condições
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    <p class="login-link">Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
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
