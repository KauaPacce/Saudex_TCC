<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Saúdex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/menu.css">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/logo_saudex.png" alt="Saúdex Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="ms-auto d-flex align-items-center">
        <a href="#Informacoes" class="nav-btn btn-outline-primary me-2">Medicina</a>
        <a href="Ultimas-noticias.php" class="nav-btn btn-outline-primary me-2">Notícias</a>
        <?php if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])): ?>
        <!-- USUÁRIO LOGADO -->
        <div class="dropdown">
    <button class="btn btn-outline-success dropdown-toggle me-2" type="button" data-bs-toggle="dropdown">
        Olá, <?php echo htmlspecialchars($_SESSION['usuario']['Nome']); ?>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="perfil.php">Meu Perfil</a></li>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li><a class="dropdown-item" href="formAdmin.php">Área Admin</a></li>
        <?php endif; ?>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
    </ul>
</div>
    <?php else: ?>
        <!-- USUÁRIO NÃO LOGADO -->
        <a href="formUsuarios.php" class="nav-btn btn-outline-success me-2">Cadastrar</a>
        <a href="formLogin.php" class="nav-btn btn-success">Entrar</a>
    <?php endif; ?>
</div>
    </div>
  </div>
</nav>

<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <span class="hero-badge"><i class="fas fa-heartbeat me-2"></i> Saúde em Primeiro Lugar</span>
        <h1 class="display-5 fw-bold mb-3">Cuidando de você com <span class="text-success">informação</span> e <span class="text-success">qualidade</span></h1>
        <p class="lead mb-4">A Saúdex é sua plataforma completa para informações confiáveis sobre saúde, promovendo bem-estar e qualidade de vida.</p>
        <a href="#Informacoes" class="btn btn-light btn-lg px-4 py-2">Explorar Conteúdo</a>
      </div>
    </div>
  </div>
</section>

<!-- ===== SEÇÃO SOBRE ===== -->
<section class="container mb-5 fade-in">
  <div class="row g-4">
    <div class="col-md-6">
      <div class="about-card p-4 h-100">
        <div class="about-icon">
          <i class="fas fa-info-circle"></i>
        </div>
        <h3 class="text-primary mb-3">Sobre Nós</h3>
        <p class="mb-0">A Saúdex é uma plataforma dedicada a fornecer informações precisas e serviços na área da saúde, promovendo bem-estar e qualidade de vida através de conteúdo verificado por especialistas.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="about-card p-4 h-100">
        <div class="about-icon">
          <i class="fas fa-bullseye"></i>
        </div>
        <h3 class="text-primary mb-3">Nossos Objetivos</h3>
        <p class="mb-0">Disseminar informações precisas sobre saúde, promover hábitos saudáveis e facilitar o acesso a serviços médicos de qualidade para toda a população.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== CARDS DE SAÚDE ===== -->
<section class="container mb-5">
  <div class="text-center mb-5 fade-in">
    <h2 id="Informacoes" class="section-title d-inline-block">Informações sobre Condições de Saúde</h2>
    <p class="text-muted">Clique em cada card para saber mais sobre essas condições</p>
  </div>
  
  <div class="row g-4">
    <div class="col-lg-3 col-md-6 fade-in delay-1">
      <div class="card health-card h-100" onclick="window.location.href='Depressao.php'">
        <div class="card-body text-center p-4">
          <div class="card-icon depression-icon">
            <i class="fas fa-brain"></i>
          </div>
          <h5 class="fw-bold mb-3">Depressão</h5>
          <p class="text-muted mb-3">A depressão é um transtorno mental caracterizado por tristeza persistente e perda de interesse em atividades.</p>
          <a href="Depressao.php" class="btn btn-outline-primary btn-sm">Saiba mais <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 fade-in delay-2">
      <div class="card health-card h-100" onclick="window.location.href='Ansiedade.php'">
        <div class="card-body text-center p-4">
          <div class="card-icon anxiety-icon">
            <i class="fas fa-hand-holding-heart"></i>
          </div>
          <h5 class="fw-bold mb-3">Ansiedade</h5>
          <p class="text-muted mb-3">A ansiedade é uma resposta natural ao estresse, mas quando se torna excessiva pode ser um transtorno.</p>
          <a href="Ansiedade.php" class="btn btn-outline-primary btn-sm">Saiba mais <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 fade-in delay-1">
      <div class="card health-card h-100" onclick="window.location.href='Obesidade.php'">
        <div class="card-body text-center p-4">
          <div class="card-icon obesity-icon">
            <i class="fas fa-weight"></i>
          </div>
          <h5 class="fw-bold mb-3">Obesidade</h5>
          <p class="text-muted mb-3">A obesidade é uma condição caracterizada pelo acúmulo excessivo de gordura corporal.</p>
          <a href="Obesidade.php" class="btn btn-outline-primary btn-sm">Saiba mais <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 fade-in delay-2">
      <div class="card health-card h-100" onclick="window.location.href='Diabetes.php'">
        <div class="card-body text-center p-4">
          <div class="card-icon diabetes-icon">
            <i class="fas fa-syringe"></i>
          </div>
          <h5 class="fw-bold mb-3">Diabetes</h5>
          <p class="text-muted mb-3">O diabetes é uma doença metabólica caracterizada pelos níveis elevados de glicose no sangue.</p>
          <a href="Diabetes.php" class="btn btn-outline-primary btn-sm">Saiba mais <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== NEWSLETTER ===== -->
<section class="container mb-5 fade-in">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 shadow-lg">
        <div class="card-body p-5 text-center">
          <i class="fas fa-envelope-open-text fa-3x text-primary mb-3"></i>
          <h3 class="mb-3">Fique por dentro das novidades</h3>
          <p class="text-muted mb-4">Receba informações atualizadas sobre saúde diretamente no seu email</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control form-control-lg" placeholder="Seu melhor email">
            <button class="btn btn-primary btn-lg px-4" type="button">Inscrever</button>
          </div>
          <small class="text-muted">Respeitamos sua privacidade. Você pode cancelar a qualquer momento.</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== RODAPÉ ===== -->
<footer class="fade-in">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="mb-3"><img src="img/logo_saudex.png" alt="Saúdex Logo" height="40" class="me-2"></div>
        <p class="text-light">Sua plataforma de confiança para informações de saúde baseadas em evidências científicas.</p>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <h5 class="mb-3">Links Rápidos</h5>
        <div class="footer-links d-flex flex-column">
          <a href="#Informacoes.php" class="mb-2">Medicina</a>
          <a href="Ultimas-noticias.php" class="mb-2">Notícias</a>
          <a href="formUsuarios.php" class="mb-2">Cadastrar</a>
          <a href="formLogin.php" class="mb-2">Entrar</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="mb-3">Condições</h5>
        <div class="footer-links d-flex flex-column">
          <a href="#" class="mb-2">Depressão</a>
          <a href="#" class="mb-2">Ansiedade</a>
          <a href="#" class="mb-2">Obesidade</a>
          <a href="#" class="mb-2">Diabetes</a>
        </div>
      </div>
      <div class="col-lg-3 mb-4">
        <h5 class="mb-3">Contato</h5>
        <div class="footer-links d-flex flex-column">
          <p class="mb-2"><i class="fas fa-envelope me-2"></i> contato@saudex.com</p>
          <p class="mb-2"><i class="fas fa-phone me-2"></i> (11) 9999-9999</p>
        </div>
      </div>
    </div>
    <hr class="my-4" style="border-color: #475569;">
    <div class="row align-items-center">
      <div class="col-md-6">
        <p class="mb-0">&copy; 2025 Saúdex. Todos os direitos reservados.</p>
      </div>
      <div class="col-md-6 text-md-end">
        <a href="#" class="text-light me-3">Política de Privacidade</a>
        <a href="#" class="text-light">Termos de Uso</a>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Adicionando efeito de clique suave
  document.querySelectorAll('.health-card').forEach(card => {
      card.addEventListener('click', function() {
          this.style.transform = 'scale(0.98)';
          setTimeout(() => {
              window.location.href = "#Informacoes";
          }, 200);
      });
  });

  // Efeito de scroll na navbar
  window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
          navbar.style.padding = '0.5rem 0';
          navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
      } else {
          navbar.style.padding = '1rem 0';
          navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
      }
  });