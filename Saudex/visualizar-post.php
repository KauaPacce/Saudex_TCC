<?php
require_once __DIR__ . '/conexao.php'; 
$conexao = (new Conexao())->getConnection();
$codPost = $_GET['codPost'] ?? 0;
$stmt = $conexao->prepare("SELECT * FROM posts WHERE codPost=?");
$stmt->execute([$codPost]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo "Postagem não encontrada.";
    exit;
}
list($titulo, $conteudo) = explode('||', $post['legenda'], 2);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title><?= htmlspecialchars($titulo) ?></title>
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/formAdmin.css">
    <style>
        .post-view { max-width:700px; margin:40px auto; background:#fff; border-radius:12px; box-shadow:var(--shadow); padding:2rem;}
        .post-view img { width:100%; max-height:350px; object-fit:cover; border-radius:8px; margin-bottom:1rem;}
        .post-title { color:var(--primary); font-size:2rem; font-weight:700;}
        .post-content { color:var(--text); font-size:1.15rem; margin-top:1rem;}
    </style>
</head>
<body>
    <div class="post-view">
        <img src="<?= htmlspecialchars($post['urlMidia']) ?>" alt="Imagem da postagem">
        <div class="post-title"><?= htmlspecialchars($titulo) ?></div>
        <div class="post-content"><?= nl2br(htmlspecialchars($conteudo)) ?></div>
        <div style="color:var(--text-light);margin-top:1rem;">Publicado em <?= date('d/m/Y H:i', strtotime($post['criadoEm'])) ?></div>
        <a href="Ultimas-noticias.php" class="form-submit" style="margin-top:2rem;display:inline-block;">Voltar</a>
    </div>
</body>
</html>