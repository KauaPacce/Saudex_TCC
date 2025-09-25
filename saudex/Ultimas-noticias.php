<?php
require_once 'conexao.php';
$conexao = (new Conexao())->getConnection();
$posts = $conexao->query("SELECT * FROM posts ORDER BY criadoEm DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Últimas Notícias</title>
    <link rel="stylesheet" href="css/noticias.css">
</head>
<body>
    <div class="container">
        <h1>-Últimas Notícias-</h1>
        <?php foreach ($posts as $post): 
            list($titulo, $conteudo) = explode('||', $post['legenda'], 2);
        ?>
            <div class="noticia">
                <h2>
                    <a href="visualizar-post.php?codPost=<?= $post['codPost'] ?>" style="color:#2563eb;text-decoration:none;">
                        <?= htmlspecialchars($titulo) ?>
                    </a>
                </h2>
                <img src="<?= htmlspecialchars($post['urlMidia']) ?>" alt="Imagem da notícia" style="max-width:400px; border-radius:8px;">
                <div class="data">Publicado em: <?= date('d/m/Y', strtotime($post['criadoEm'])) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>