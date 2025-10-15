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

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e8fdf2, #d1fae5);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 1.5rem 2rem;
            border-radius: 0 0 20px 20px;
            text-align: center;
        }

        header h1 {
            color: #059669;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }

        header p {
            color: #555;
            font-size: 1rem;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 2.5rem auto;
            padding: 0 1rem;
        }

        .noticia {
            background-color: #fff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 16px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .noticia:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .noticia h2 {
            margin-bottom: 1rem;
            font-size: 1.6rem;
            color: #047857;
        }

        .noticia img {
            width: 100%;
            max-height: 350px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .noticia .data {
            font-size: 0.9rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }

        footer {
            background-color: #111827;
            color: #d1d5db;
            text-align: center;
            padding: 1rem;
            margin-top: auto;
            font-size: 0.9rem;
        }

        .btn-voltar {
            display: inline-block;
            background-color: #10b981;
            color: #fff;
            padding: 0.7rem 1.4rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-voltar:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 1.8rem;
            }

            .noticia h2 {
                font-size: 1.4rem;
            }
        }
    </style>
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
