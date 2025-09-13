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

        <?php
    
        $noticias = [
            [
                'titulo' => 'Novo Posto de Saúde Inaugurado no Bairro Central',
                'conteudo' => 'A nova unidade atenderá cerca de 5 mil pessoas e contará com serviços de clínico geral, pediatria e enfermagem.',
                'imagem' => 'https://www.lajeado.rs.gov.br/portal/imagens/Posto%20de%20Sa%C3%83%C2%BAde%20reformado.jpeg',
                'data' => '13/06/2022'
            ],
            [
                'titulo' => 'Campanha de Vacinação Contra a Gripe Começa Segunda-feira',
                'conteudo' => 'Pessoas acima de 60 anos e crianças de até 5 anos devem procurar a unidade de saúde mais próxima.',
                'imagem' => 'https://imagens.ebc.com.br/_f9fH9tCZisYQftR-nshGz9OUIs=/1170x700/smart/https://agenciabrasil.ebc.com.br/sites/default/files/thumbnails/image/pzzb8342.jpg?itok=wYUxhVRe',
                'data' => '31/12/2023'
            ],
            [
                'titulo' => 'Aplicativo SaúdeX Ganha Nova Função de Agendamento Online',
                'conteudo' => 'Agora é possível agendar consultas pelo app de forma simples e rápida, evitando filas.',
                'imagem' => 'https://via.placeholder.com/900x300?text=App+Sa%C3%BAdeX',
                'data' => '01/07/2025'
            ]
        ];

        // Exibe as notícias
        foreach ($noticias as $noticia) {
            echo '<div class="noticia">';
            echo '<h2>' . htmlspecialchars($noticia['titulo']) . '</h2>';
            echo '<p>' . htmlspecialchars($noticia['conteudo']) . '</p>';
            echo '<img src="' . htmlspecialchars($noticia['imagem']) . '" alt="Imagem da notícia">';
            echo '<div class="data">Publicado em: ' . $noticia['data'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>