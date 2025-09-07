<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
<div id="geral">
  	<div class="container">
		<form id="cadastro" action="contrUsuarios.php" method="POST" onsubmit="return validarFormulario();">
		  <input type="hidden" name="acao" value="Cadastrar">
			<div class="row">
				<label for="Nome">Nome Completo</label>
				<input type="text" id="Nome" name="Nome" placeholder="Digite o Nome!" required>
			</div>

			<div class="row">
				<label for="Email">Email</label>
				<input type="email" id="Email" name="Email" placeholder="seu@email.com" required>
			</div>

			<div class="row">
				<label for="Senha">Senha</label>
				<input type="password" id="Senha" name="Senha" placeholder="Crie sua senha!" required>
			</div>

			<div class="row">
				<label for="Telefone">Telefone</label>
				<input type="text" id="Telefone" name="Telefone" placeholder="(00) 00000-0000" required>
			</div>

			<div class="row">
				<label for="cpf">Cpf</label>
				<input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
			</div>

			<div class="row">
				<label for="cep">Cep</label>
				<input type="text" id="cep" name="cep" placeholder="00000-000" required>
			</div>

			<div class="row">
				<label for="nasc">Nascimento</label>
				<input type="date" name="nasc" id="nasc" max="<?php echo date('Y-m-d'); ?>" required>
			</div>

			<div class="row">
				<label>Genero</label>
				<div class="row-radio">
					<input type="radio" name="genero" value="Masculino" required>Masculino
					<input type="radio" name="genero" value="Feminino" required>Feminino
					<input type="radio" name="genero" value="Outro" required>Outro
				</div>
			</div>

			<div class="row">
				<button type="submit" id="btnEnviar" value="Enviar">Criar Conta</button>
			</div>

			<div class="login-link"> <!-- precisa ser estilizado -->
				Já possui uma conta? <a href="formLogin.php">Entrar</a>
			</div>
		</form>
  	</div>
</div>

	<script src="js/Pacientes.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>

// Máscaras para os campos
$(document).ready(function(){ 
		$('#cpf').mask('000.000.000-00');
		$('#Telefone').mask('(00) 00000-0000');
		$('#cep').mask('00000-000');
});

// Validar formulário
function validarFormulario() {
    let email = document.getElementById("Email").value;
    let senha = document.getElementById("Senha").value;
	let nome = document.getElementById("Nome").value;

    if (!email.includes("@") || !email.includes(".")) {
        alert("Digite um email válido!");
        return false;
    }

    if (senha.length < 6) {
        alert("A senha deve ter no mínimo 6 caracteres!");
        return false;
    }

	if (nome.length < 3) {
		alert("O nome deve ter no mínimo 3 caracteres!");
		return false;
	}

    return true;
}

//Concluir cadastro via AJAX
$(document).ready(function() {
    $('#cadastro').on('submit', function(e) {
        e.preventDefault();
        
        if (validarFormulario()) {
            var formData = $(this).serialize();
            
            $.ajax({
                type: 'POST',
                url: 'contrUsuarios.php',
                data: formData,
                success: function(response) {
                    if (response.includes("sucesso")) {
                        alert('Cadastro realizado com sucesso! Redirecionando para login...');
                        setTimeout(function() {
                            window.location.href = 'formLogin.php';
                        }, 2000);
                    } else {
                        alert('Erro no cadastro: ' + response);
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
