<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Acesso negado');
}

if (!isset($_SESSION['usuario']['cod'])) { 
    die('Usuário não autenticado. Código de usuário não encontrado na sessão.');
}
$codUsuario = $_SESSION['usuario']['cod'];

require_once 'conexao.php';
$conexao = (new Conexao())->getConnection();

require_once 'clssaudex.php'; 
$saudex = new clssaudex();

// Criar postagem
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'criar') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $imagem = '';

    // Validar e processar upload de imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {

        $mimeType = mime_content_type($_FILES['imagem']['tmp_name']);
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];

    // Validar tipo de arquivo
    if (!in_array($mimeType, $allowedMimes)) {
        header('Location: postagem.php?error=Tipo de arquivo não permitido.');
        exit;
    }
        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['imagem']['tmp_name'], 'imagens/' . $nomeArquivo);
        $imagem = 'imagens/' . $nomeArquivo;
    }
    $legenda = $titulo . '||' . $conteudo;
    $stmt = $conexao->prepare("INSERT INTO posts (codUsuario, legenda, urlMidia, tipoMidia) VALUES (?, ?, ?, 'imagem')");
    $stmt->execute([$codUsuario, $legenda, $imagem]);

      // Pega o ID do novo post
    $codNovoPost = $conexao->lastInsertId();

    //  Chama o método de notificação
    if ($codNovoPost) {
        $saudex->NotificarNovoPost($codUsuario, $codNovoPost); 
    }
    header('Location: postagem.php');
    exit;
}

// Editar postagem
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'editar') {
    $codPost = $_POST['codPost'];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $imagem = $_POST['imagemAtual'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['imagem']['tmp_name'], 'imagens/' . $nomeArquivo);
        $imagem = 'imagens/' . $nomeArquivo;
    }

    $legenda = $titulo . '||' . $conteudo;
    $stmt = $conexao->prepare("UPDATE posts SET legenda=?, urlMidia=? WHERE codPost=?");
    $stmt->execute([$legenda, $imagem, $codPost]);
    header('Location: postagem.php');
    exit;
}

// Buscar postagens
$posts = $conexao->query("SELECT * FROM posts ORDER BY criadoEm DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>Painel de Postagens</title>
    <link rel="stylesheet" href="css/postagem.css">
</head>
<body>
<div class="custom-container">
    <h2>Painel de Postagens</h2>
    <!-- Formulário de Nova Postagem -->
    <form class="post-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="criar">
        <div>
            <label>Título:</label>
            <input type="text" name="titulo" required style="width:100%;padding:0.5rem;">
        </div>
        <div>
            <label>Conteúdo:</label>
            <textarea name="conteudo" required style="width:100%;height:100px;padding:0.5rem;"></textarea>
        </div>
        <div>
            <label>Imagem:</label>
            <input type="file" name="imagem" accept="image/*" required>
        </div>
        <button type="submit" class="form-submit" style="margin-top:1rem;">Publicar</button>
    </form>

    <!-- Lista de Postagens -->
    <div class="post-list">
        <h3>Postagens Recentes</h3>
        <?php foreach ($posts as $post): 
            list($titulo, $conteudo) = explode('||', $post['legenda'], 2);
        ?>
        <div class="post-item">
            <img src="<?= htmlspecialchars($post['urlMidia']) ?>" class="post-img" alt="Imagem">
            <div style="flex:1;">
                <a href="visualizar-post.php?codPost=<?= $post['codPost'] ?>" style="color:var(--primary);font-weight:600;font-size:1.1rem;">
                    <?= htmlspecialchars($titulo) ?>
                </a>
                <div style="color:var(--text-light);font-size:0.95rem;">Publicado em <?= date('d/m/Y H:i', strtotime($post['criadoEm'])) ?></div>
            </div>
            <form method="POST" enctype="multipart/form-data" style="margin:0;">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="codPost" value="<?= $post['codPost'] ?>">
                <input type="hidden" name="imagemAtual" value="<?= htmlspecialchars($post['urlMidia']) ?>">
                <input type="text" name="titulo" value="<?= htmlspecialchars($titulo) ?>" required style="width:120px;">
                <input type="text" name="conteudo" value="<?= htmlspecialchars($conteudo) ?>" required style="width:180px;">
                <input type="file" name="imagem" accept="image/*">
                <button type="submit" class="edit-btn">Editar</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>