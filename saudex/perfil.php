<?php
session_start();

// Se o usuário não estiver logado, volta pro login
if (!isset($_SESSION['usuario'])) {
    header("Location: formLogin.php");
    exit;
}

// Conexão com banco
$pdo = new PDO("mysql:host=localhost;dbname=saudex;charset=utf8", "root", "");

// Carrega usuário atualizado do banco
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cod = ?");
$stmt->execute([$_SESSION['usuario']['cod']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Upload da foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $arquivo = $_FILES['foto'];

    if ($arquivo['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeFoto = "foto_" . $usuario['cod'] . "." . $ext;
        $caminho = __DIR__ . "/uploads/" . $nomeFoto;

        if (!is_dir(__DIR__ . "/uploads")) {
            mkdir(__DIR__ . "/uploads");
        }

        move_uploaded_file($arquivo['tmp_name'], $caminho);

        $caminhoFoto = "uploads/" . $nomeFoto;

        // Atualiza no banco
        $stmt = $pdo->prepare("UPDATE usuarios SET Foto = ? WHERE cod = ?");
        $stmt->execute([$caminhoFoto, $usuario['cod']]);

        $usuario['Foto'] = $caminhoFoto;
        $_SESSION['usuario'] = $usuario;
    }
}

// Editar perfil
if (isset($_POST['editar'])) {
    $novoNome = trim($_POST['nome']);
    $novoEmail = trim($_POST['email']);

    if ($novoNome && $novoEmail) {
        $stmt = $pdo->prepare("UPDATE usuarios SET Nome = ?, Email = ? WHERE cod = ?");
        $stmt->execute([$novoNome, $novoEmail, $usuario['cod']]);

        $usuario['Nome'] = $novoNome;
        $usuario['Email'] = $novoEmail;
        $_SESSION['usuario'] = $usuario;
    }
}

// Excluir perfil
if (isset($_POST['excluir'])) {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE cod = ?");
    $stmt->execute([$usuario['cod']]);

    session_destroy();
    header("Location: formLogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: url('img/saudebackground.png') no-repeat center center fixed;
            background-size: cover;
        }
        #geral {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255,255,255,0.92);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.18);
            padding: 40px 32px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #1976d2;
        }
        .foto {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #1976d2;
            margin-bottom: 16px;
        }
        input[type="file"], input[type="text"], input[type="email"] {
            margin: 10px 0;
            padding: 8px;
            width: 95%;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #1976d2 0%, #26c6da 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.10);
            transition: background 0.2s;
            margin-top: 8px;
        }
        button:hover {
            background: linear-gradient(90deg, #1565c0 0%, #00acc1 100%);
        }
        .btn-excluir {
            background: linear-gradient(90deg, #e53935 0%, #d32f2f 100%);
        }
        .btn-excluir:hover {
            background: linear-gradient(90deg, #c62828 0%, #b71c1c 100%);
        }
        a {
            display: block;
            margin-top: 12px;
            color: #1976d2;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="geral">
    <div class="container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($usuario['Nome']); ?>!</h2>
        <p>Email: <?php echo htmlspecialchars($usuario['Email']); ?></p>

        <?php if (!empty($usuario['Foto'])): ?>
            <img src="<?php echo $usuario['Foto']; ?>" alt="Foto de perfil" class="foto">
        <?php else: ?>
            <p>Sem foto de perfil</p>
        <?php endif; ?>

        <!-- Upload da Foto -->
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="foto" accept="image/*">
            <button type="submit">Adicionar/Alterar Foto</button>
        </form>

        <!-- Editar Perfil -->
        <form method="POST">
            <input type="text" name="nome" placeholder="Novo nome" value="<?php echo htmlspecialchars($usuario['Nome']); ?>">
            <input type="email" name="email" placeholder="Novo email" value="<?php echo htmlspecialchars($usuario['Email']); ?>">
            <button type="submit" name="editar">Editar Perfil</button>
        </form>

        <!-- Excluir Perfil -->
        <form method="POST">
            <button type="submit" name="excluir" class="btn-excluir">Excluir Perfil</button>
        </form>

        <a href="logout.php">Sair</a>
    </div>
</div>
</body>
</html>
