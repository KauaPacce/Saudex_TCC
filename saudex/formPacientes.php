<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
<div id="geral">
  	<div class="container">
		<form id="cadastro" action="contrPacientes.php" method="POST">
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
					<input type="text" id="Nome" name="Nome" placeholder="Digite o Nome!" required>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Senha">Senha</label>
				</div>
				<div class="col-75">
					<input type="password" id="Senha" name="Senha" placeholder="Digite a senha!" required>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Email">Email</label>
				</div>
				<div class="col-75">
					<input type="email" id="Email" name="Email" placeholder="seu@email.com" required>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="Telefone">Telefone</label>
				</div>
				<div class="col-75">
					<input type="text" id="Telefone" name="Telefone" placeholder="(00) 00000-0000" required>
				</div>

			</div>
			<div class="row">
				<div class="col-25">
					<label for="cpf">Cpf</label>
				</div>
				<div class="col-75">
					<input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="cep">Cep</label>
				</div>
				<div class="col-75">
					<input type="text" id="cep" name="cep" placeholder="00000-000" required>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="nasc">Nascimento</label>
				</div>
				<div class="col-75">
					<input type="date" name="nasc" id="nasc" max="<?php echo date('Y-m-d'); ?>" required>
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
				<input type="button" id="btnImpressao" value="Impressao" onclick="Imprimir();">
				<input type="button" id="btnGraf_JS"   value="Graf_JS"   onclick="Grafico();">
				<a href="grf.php"><input type="button" id="Graf_Direto" value="Graf_Direto"></a>
			</div>
		</form>
  	</div>

	<h2>RETORNO DO AJAX/JSON</h2>
	<div id="resposta"> 
		<!-- dentro desta div fica o retorno -->
	</div>
</div> 

	<script src="js/Pacientes.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
	//===MASCARA PARA O FORMULARIO =================================
    $(document).ready(function(){ 
        $('#cpf').mask('000.000.000-00');
		$('#Telefone').mask('(00) 00000-0000');
		$('#cep').mask('00000-000');
    });
</script>
</body>
</html>