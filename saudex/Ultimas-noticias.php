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
    <title>Últimas Notícias - Saúdex</title>
    <link rel="stylesheet" href="css/noticias.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    
</head>
<body>

    <header>
        <h1><i class="fas fa-newspaper me-2"></i>Últimas Notícias</h1>
        <p>Fique por dentro das novidades da saúde e bem-estar</p>
    </header>

    <div class="container">
        <?php foreach ($posts as $post): 
            list($titulo, $conteudo) = explode('||', $post['legenda'], 2);
        ?>
            <div class="noticia">
                <h2>
                    <a href="visualizar-post.php?codPost=<?= $post['codPost'] ?>" style="color:#047857;text-decoration:none;">
                        <?= htmlspecialchars($titulo) ?>
                    </a>
                </h2>
                <img src="<?= htmlspecialchars($post['urlMidia']) ?>" alt="Imagem da notícia">
                <div class="data"><i class="far fa-calendar-alt me-1"></i>Publicado em: <?= date('d/m/Y', strtotime($post['criadoEm'])) ?></div>
            </div>
        <?php endforeach; ?>

        <div class="text-center" style="text-align:center; margin-top:2rem;">
            <a href="Menu.php" class="btn-voltar"><i class="fas fa-arrow-left me-2"></i> Voltar ao Início</a>
        </div>
    </div>

    <footer>
        <p>© 2025 Saúdex - Todos os direitos reservados.</p>
    </footer>

</body>
</html>
