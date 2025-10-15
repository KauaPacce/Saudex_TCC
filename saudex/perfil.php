<?php
session_start();

// Se não estiver logado, redireciona
if (!isset($_SESSION['usuario'])) {
    header("Location: formLogin.php");
    exit;
}

// Conexão com banco
$pdo = new PDO("mysql:host=localhost;dbname=saudex;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Busca usuário atualizado
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cod = ?");
$stmt->execute([$_SESSION['usuario']['cod']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Mensagens
$erros = [];
$mensagemSucesso = "";

// Atualização de perfil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $novoNome = trim($_POST['nome'] ?? '');
    $novoEmail = trim($_POST['email'] ?? '');
    $novoTelefone = trim($_POST['telefone'] ?? '');
    $novoCpf = trim($_POST['cpf'] ?? '');
    $novaNasc = trim($_POST['nasc'] ?? '');
    $novoGenero = trim($_POST['genero'] ?? '');

    // Validações
    if (empty($novoNome)) $erros[] = "Nome é obrigatório.";
    if (empty($novoEmail) || !filter_var($novoEmail, FILTER_VALIDATE_EMAIL)) $erros[] = "Email inválido.";
    if (empty($novoTelefone)) $erros[] = "Telefone é obrigatório.";
    if (empty($novoCpf) || !preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $novoCpf)) $erros[] = "CPF inválido (use XXX.XXX.XXX-XX).";
    if (empty($novaNasc)) $erros[] = "Data de nascimento é obrigatória.";
    if (empty($novoGenero)) $erros[] = "Selecione um gênero.";

    if (empty($erros)) {
        // Upload da foto
        $caminhoFoto = $usuario['Foto'];
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
            $permitidos = ['jpg', 'jpeg', 'png'];
            if (in_array($ext, $permitidos)) {
                $dir = "uploads/";
                if (!is_dir($dir)) mkdir($dir, 0755, true);
                $novoNomeFoto = "foto_" . $usuario['cod'] . "." . $ext;
                $caminhoFoto = $dir . $novoNomeFoto;
                move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoFoto);
            } else {
                $erros[] = "Apenas imagens JPG e PNG são aceitas.";
            }
        }

        if (empty($erros)) {
            // Atualiza no banco
            $stmt = $pdo->prepare("
                UPDATE usuarios 
                SET Nome = ?, Email = ?, Telefone = ?, cpf = ?, nasc = ?, genero = ?, Foto = ?
                WHERE cod = ?
            ");
            $stmt->execute([$novoNome, $novoEmail, $novoTelefone, $novoCpf, $novaNasc, $novoGenero, $caminhoFoto, $usuario['cod']]);

            $mensagemSucesso = "Perfil atualizado com sucesso!";
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cod = ?");
            $stmt->execute([$usuario['cod']]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['usuario'] = $usuario;
        }
    }
}

// Botão Excluir
if (isset($_POST['excluir'])) {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE cod = ?");
    $stmt->execute([$usuario['cod']]);
    session_destroy();
    header("Location: formLogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>
<div id="geral">
    <div class="container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($usuario['Nome']); ?>!</h2>

        <?php if ($mensagemSucesso): ?>
            <div class="sucesso"><?php echo htmlspecialchars($mensagemSucesso); ?></div>
        <?php endif; ?>

        <?php if (!empty($erros)): ?>
            <div class="erros">
                <ul>
                    <?php foreach ($erros as $erro): ?>
                        <li><?php echo htmlspecialchars($erro); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <img src="<?php echo htmlspecialchars($usuario['Foto'] ?? 'img/default.png'); ?>" alt="Foto de perfil" class="foto">

        <!-- Botão para ativar edição -->
        <button type="button" id="btnEditar">Editar Perfil</button>

        <!-- Seção escondida com formulário -->
        <div id="editarSection">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="foto" accept="image/*">
                <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['Nome']); ?>">
                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['Email']); ?>">
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($usuario['Telefone']); ?>">
                <input type="text" name="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>">
                <input type="date" name="nasc" value="<?php echo htmlspecialchars($usuario['nasc']); ?>">
                <select name="genero">
                    <option value="">Selecione...</option>
                    <option value="Masculino" <?php echo ($usuario['genero'] === 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?php echo ($usuario['genero'] === 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                    <option value="Outro" <?php echo ($usuario['genero'] === 'Outro') ? 'selected' : ''; ?>>Outro</option>
                </select>
                <button type="submit" name="salvar">Salvar Alterações</button>
            </form>
        </div>

        <form method="POST">
            <button type="submit" name="excluir" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">Excluir Perfil</button>
        </form>

        <a href="Menu.php">Sair</a>
    </div>
</div>

<script>
document.getElementById('btnEditar').addEventListener('click', () => {
    const section = document.getElementById('editarSection');
    section.style.display = section.style.display === 'none' ? 'block' : 'none';
});
</script>
</body>
</html>
