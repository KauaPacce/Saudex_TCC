<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>Resetar Senha</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <div id="geral">
        <div class="container">
            <?php
            $token = $_GET['token'] ?? '';
            if (empty($token)) {
                echo "<p>Token inválido.</p>";
                exit;
            }
            // Aqui, valide o token no backend (veja contrUsuarios.php)
            ?>
        <form id="reset" action="contrUsuarios.php" method="POST" onsubmit="return validarSenha();">
            <input type="hidden" name="acao" value="ResetPassword">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <div class="row">
                <label for="NovaSenha">Nova Senha</label>
                <input type="password" id="NovaSenha" name="NovaSenha" placeholder="Digite a nova senha" required>
            </div>
            <div class="row">
                <label for="ConfirmarSenha">Confirmar Senha</label>
                <input type="password" id="ConfirmarSenha" name="ConfirmarSenha" placeholder="Confirme a nova senha" required>
            </div>
            <button type="submit" class="btn-criar-conta">Resetar Senha</button>
        </form>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function validarSenha() {
        let senha = document.getElementById("NovaSenha").value;
        let confirmar = document.getElementById("ConfirmarSenha").value;
        if (senha.length < 6) {
            alert("A senha deve ter no mínimo 6 caracteres!");
            return false;
        }
        if (senha !== confirmar) {
            alert("As senhas não coincidem!");
            return false;
        }
        return true;
    }
    $(document).ready(function() {
        $('#reset').on('submit', function(e) {
            e.preventDefault();
            if (validarSenha()) {
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'contrUsuarios.php',
                    data: formData,
                    success: function(response) {
                        if (response.includes("sucesso")) {
                            alert('Senha resetada com sucesso! Redirecionando...');
                            window.location.href = 'formLogin.php';
                        } else {
                            alert('Erro: ' + response);
                        }
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
     