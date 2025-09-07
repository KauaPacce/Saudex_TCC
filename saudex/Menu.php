<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Saúdex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand logo" href="Ultimas-noticias.php">Saúdex</a>
      
      <div class="ms-auto">
        <a href="Medicina.php" class="btn btn-dark me-2">Medicina</a>
        <a href="Ultimas-noticias.php" class="btn btn-secondary me-2">Últimas Notícias</a>
        <?php if (isset($_SESSION['usuario'])): ?>
          <a href="perfil.php" class="btn btn-outline-primary me-2" title="Perfil">
            <img src="img/iconperfil.png" alt="Perfil" style="width:32px; height:32px;">
          </a>
        <?php else: ?>
          <a href="formUsuarios.php" class="btn btn-success me-2">Cadastrar</a>
          <a href="formLogin.php" class="btn btn-primary">Entrar</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <main class="container my-5 flex-grow-1">
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h2 class="text-primary">Sobre Nós</h2>
        <p>
          A Saúdex é uma plataforma dedicada a fornecer informações e serviços na área da saúde,
          promovendo bem-estar e qualidade de vida.
        </p>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h2 class="text-primary">Objetivos</h2>
        <p>
          Nossos objetivos incluem a disseminação de informações precisas sobre saúde, a promoção de
          hábitos saudáveis e a facilitação do acesso a serviços médicos.
        </p>
      </div>
    </div>
  </main>

  <footer class="bg-light mt-auto py-3">
    <div class="container text-center">
      <h5 class="text-primary">Fale Conosco</h5>
      <p class="mb-0">
        Para mais informações, entre em contato conosco através do nosso e-mail:
        <strong>contato@saúdex.com.br</strong>.
      </p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>