<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>Esqueci a Senha</title>
    <link rel="stylesheet" href="css/cadastro.css"> 
</head>
<body>
    <div id="geral">
        <div class="container">
            <form id="forgot" action="contrUsuarios.php" method="POST" onsubmit="return validarEmail();">
                <input type="hidden" name="acao" value="ForgotPassword">
            <div class="row">
                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email" placeholder="Digite seu e-mail cadastrado" required>
            </div>
                <button type="submit" class="btn-criar-conta">Enviar Link de Reset</button>
            <div class="login-link">
                <a href="formLogin.php">Voltar ao Login</a>
            </div>
        </form>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function validarEmail() {
        let email = document.getElementById("Email").value;
        if (!email.includes("@") || !email.includes(".com")) {
            alert("Digite um email válido!");
            return false;
        }
        return true;
    }
    $(document).ready(function() {
        $('#forgot').on('submit', function(e) {
            e.preventDefault();
            if (validarEmail()) {
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'contrUsuarios.php',
                    data: formData,
                    success: function(response) {
                        alert('Se o e-mail existir, um link foi enviado!');
                        window.location.href = 'formLogin.php';
                    },
                    error: function() {
                        alert('Erro ao processar a requisição');
                    }
                });
            }
        });
    });
</script>
</body>
</html>
     