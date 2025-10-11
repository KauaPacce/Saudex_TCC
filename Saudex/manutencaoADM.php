<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Acesso negado');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gerenciamento de Usuários</title>
    <link rel="stylesheet" href="css/manutencao.css">
</head>

<body>
<div id="geral">
  	<div class="container">
        <h2>Área Administrativa - Controle de Usuários</h2>
		<form id="controle" action="contrAdmin.php" method="POST">
			<div class="row">
				<div class="col-25">
					<label for="cod">Codigo</label>
				</div>
				<div class="col-75">
					<input type="text" id="cod" name="cod" placeholder="Digite o Codigo...">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Nome">Nome Completo</label>
				</div>
				<div class="col-75">
					<input type="text" id="Nome" name="Nome" placeholder="Digite o Nome!" >
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Senha">Senha</label>
				</div>
				<div class="col-75">
					<input type="password" id="Senha" name="Senha" placeholder="Digite a Senha!" >
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Email">Email</label>
				</div>
				<div class="col-75">
					<input type="email" id="Email" name="Email" placeholder="seu@email.com" >
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Telefone">Telefone</label>
				</div>
				<div class="col-75">
					<input type="text" id="Telefone" name="Telefone" placeholder="(00) 00000-0000" >
				</div>

			</div>
			<div class="row">
				<div class="col-25">
					<label for="cpf">Cpf</label>
				</div>
				<div class="col-75">
					<input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" >
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="cep">Cep</label>
				</div>
				<div class="col-75">
					<input type="text" id="cep" name="cep" placeholder="00000-000" >
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="nasc">Nascimento</label>
				</div>
				<div class="col-75">
					<input type="date" name="nasc" id="nasc" max="<?php echo date('Y-m-d'); ?>" >
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="genero">Genero</label>
				</div>
				<div class="col-75">
					<input type="radio" name="genero" value="Masculino">Homem
					<input type="radio" name="genero" value="Feminino">Mulher
					<input type="radio" name="genero" value="Outro">Outro
				</div>
			</div>
			<br>
			<div class="row">
				<input type="button" id="btnEnviar"    value="Enviar"    onclick="Cadastrar();">
				<input type="button" id="btnApagar"    value="Excluir"   onclick="Excluir();">
				<input type="button" id="btnPesquisar" value="Pesquisar" onclick="Pesquisar();">
				<input type="button" id="btnEditar"    value="Editar"    onclick="Editar();">
			</div>
		</form>
  	</div>

	<div id="resposta"> 
		<!-- dentro desta div fica o retorno -->
	</div>
</div>

<script>
// Máscaras para os campos
$(document).ready(function(){ 
		$('#cpf').mask('000.000.000-00');
		$('#Telefone').mask('(00) 00000-0000');
		$('#cep').mask('00000-000');
});

        $(document).ready(function() {
            carregarUsuarios();
        });
</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="js/Admin.js"></script>
</body>
</html>