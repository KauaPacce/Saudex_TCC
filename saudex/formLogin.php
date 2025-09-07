<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Saúdex</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
 <div id="geral">
    <div class="container">
        <form id="login" action="contrLogin.php" method="POST">
            <div class="row">
                <label for="Email">Email</label> 
                <input type="text" id="Email" name="Email" placeholder="Digite o seu Email.">
            </div>
            <div class="row">
                <label for="Senha">Senha</label> 
                <input type="password" id="Senha" name="Senha" placeholder="Digite a sua Senha.">
            </div>
            <div class="row">
                <button type="submit">Entrar</button>
            </div>
            <div class="login-link">
                Não possui uma conta? <a href="formUsuarios.php">Cadastre-se</a>
            </div>
        </form>
    </div>
 </div> 
</body>
</html>
