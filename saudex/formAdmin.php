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
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="css/menuAdm.css"> 
</head>
<body>
    <div class="custom-container">
        <div class="section-header">
            <span class="section-subtitle">Bem-vindo, Administrador!</span>
            <h1 class="section-title">Painel Administrativo</h1>
            <p class="section-description">
                Olá, <strong>Admin</strong>! Gerencie o sistema Saudex com eficiência. Abaixo estão suas principais responsabilidades.
            </p>
        </div>
        <div class="divider"></div>
        <div class="services-grid" style="margin-bottom:2rem;">
            <div class="service-card">
                <div class="service-title">Especialista em Saúde</div>
                <div class="service-description">
                    Publique conteúdos detalhados sobre doenças, sintomas, prevenção e tratamentos para informar e orientar a comunidade.
                </div>
            </div>
            <div class="service-card">
                <div class="service-title">Atualização de Informações</div>
                <div class="service-description">
                    Mantenha o sistema sempre atualizado com as últimas pesquisas, notícias e recomendações sobre saúde e bem-estar.
                </div>
            </div>
            <div class="service-card">
                <div class="service-title">Interação com Usuários</div>
                <div class="service-description">
                    Responda dúvidas, modere comentários e incentive o engajamento dos usuários para promover uma rede de apoio saudável.
                </div>
            </div>
        </div>
        <div style="display:flex; gap:2rem; justify-content:center; margin-top:2rem;">
            <a href="manutencaoADM.php" class="form-submit" style="text-align:center; text-decoration:none;">Controle de Usuários</a>
            <a href="postagem.php" class="form-submit" style="text-align:center; text-decoration:none;">Gerenciar Postagens</a>
        </div>
    </div>
</body>
</html>