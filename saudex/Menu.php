<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Saúdex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/menu.css">

</head>
<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo_saudex.png" alt="logo" style="width:200px; height:120px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
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
          hábitos saudáveis e a facilitação del acesso a serviços médicos.
        </p>
      </div>
    </div>
  </main>


  <!-- card sobre as doenças -->
<div class="container">     
      <h1 class="page-title">Informações sobre Condições de Saúde</h1>
        <div class="cards-container">
            <!-- Card Depressão -->
            <div class="health-card depression-card" onclick="window.location.href='Medicina.php'">
                <div class="card-image">
                    <div class="card-overlay">
                        <h3 class="card-title">Depressão</h3>
                        <p class="card-description">
                            A depressão é um transtorno mental caracterizado por tristeza persistente, perda de interesse em atividades e diminuição de energia. Afeta como uma pessoa pensa, sente e se comporta, podendo levar a diversos problemas emocionais e físicos.
                        </p>
                        <span class="card-link">
                            Saiba mais 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Card Ansiedade -->
            <div class="health-card anxiety-card" onclick="window.location.href='Medicina.php'">
                <div class="card-image">
                    <div class="card-overlay">
                        <h3 class="card-title">Ansiedade</h3>
                        <p class="card-description">
                            A ansiedade é uma resposta natural ao estresse, mas quando se torna excessiva e persistente, pode caracterizar um transtorno. Sintomas incluem preocupação constante, nervosismo, tensão muscular e taquicardia, interferindo nas atividades diárias.
                        </p>
                        <span class="card-link">
                            Saiba mais 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Card Obesidade -->
            <div class="health-card obesity-card" onclick="window.location.href='Medicina.php'">
                <div class="card-image">
                    <div class="card-overlay">
                        <h3 class="card-title">Obesidade</h3>
                        <p class="card-description">
                            A obesidade é uma condição médica caracterizada pelo acúmulo excessivo de gordura corporal, com potencial impacto negativo na saúde. Está associada a diversas comorbidades, como diabetes tipo 2, doenças cardiovasculares e alguns tipos de câncer.
                        </p>
                        <span class="card-link">
                            Saiba mais 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Card Diabetes -->
            <div class="health-card diabetes-card" onclick="window.location.href='Medicina.php'">
                <div class="card-image">
                    <div class="card-overlay">
                        <h3 class="card-title">Diabetes</h3>
                        <p class="card-description">
                            O diabetes é uma doença metabólica caracterizada pelos níveis elevados de glicose no sangue. Pode resultar da produção insuficiente de insulina (tipo 1) ou da incapacidade do corpo de usar adequadamente a insulina produzida (tipo 2).
                        </p>
                        <span class="card-link">
                            Saiba mais 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- fim do card sobre as doenças -->

    <!-- Seção de Valores -->
    <div class="section-header">
      <span class="section-subtitle"></span>
      <h2 class="section-title">Nossos Valores</h2>
      <p class="section-description">Os valores morais traduzem nossos princípios e nos permitem uma atuação ética e consistente com nossos objetivos</p>
    </div>

    <div class="divider"></div>

    <div class="values-grid">
      <div class="value-card">
        <h3 class="value-title">Confiança</h3>
        <p class="value-description">Construímos relacionamentos baseados em transparência, ética e credibilidade nas informações.</p>
        <ul class="value-details">
          <li>Informações verificadas por especialistas</li>
          <li>Transparência em todos os processos</li>
          <li>Compromisso com a verdade científica</li>
        </ul>
      </div>

      <div class="value-card">
        <h3 class="value-title">Compromisso Social</h3>
        <p class="value-description">Dedicamos nosso trabalho à democratização do acesso à informação de qualidade na área da saúde.</p>
        <ul class="value-details">
          <li>Acesso igualitário aos serviços</li>
          <li>Responsabilidade social</li>
          <li>Impacto positivo na comunidade</li>
        </ul>
      </div>

      <div class="value-card">
        <h3 class="value-title">Inovação</h3>
        <p class="value-description">Utilizamos tecnologia avançada para facilitar acesso às informações de saúde confiáveis.</p>
        <ul class="value-details">
          <li>Tecnologia de ponta</li>
          <li>Soluções criativas</li>
          <li>Melhoria contínua</li>
        </ul>
      </div>

      <div class="value-card">
        <h3 class="value-title">Excelência</h3>
        <p class="value-description">Buscamos a perfeição em tudo que fazemos, priorizando qualidade em cada aspecto do nosso trabalho.</p>
        <ul class="value-details">
          <li>Qualidade superior</li>
          <li>Profissionais qualificados</li>
          <li>Busca pela perfeição</li>
        </ul>
      </div>
    </div>

    <!-- Seção de Contato -->
    <div class="section-header">
      <h2 class="section-title">Fale Conosco</h2>
      <p class="section-description">Entre em contato conosco através dos meios disponíveis abaixo</p>
    </div>

    <div class="divider"></div>

      <div class="contact-info">
        <div class="contact-info-card">
          <div class="contact-info-card-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
          </div>
          <div class="contact-info-card-content">
            <h4 class="contact-info-card-title">Telefone</h4>
            <p class="contact-info-card-info">(11) 9 9999-9999</p>
            <p class="contact-info-card-description">Seg-Sex: 8h às 18h</p>
          </div>
        </div>

        <div class="contact-info-card">
          <div class="contact-info-card-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
          </div>
          <div class="contact-info-card-content">
            <h4 class="contact-info-card-title">Email</h4>
            <p class="contact-info-card-info">contato@saudemais.com.br</p>
            <p class="contact-info-card-description">Resposta em até 1 dia útil</p>
          </div>
        </div>


        <div class="emergency-contact">
          <div class="emergency-contact-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
          </div>
          <h4 class="emergency-contact-title">Atendimento de Emergência</h4>
          <p class="emergency-contact-number">192 - SAMU</p>
          <p class="emergency-contact-description">Disponível 24 horas por dia</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-light mt-auto py-3">
    <div class="container text-center">
      <h5 class="text-primary">Fale Conosco</h5>
      <p class="mb-0">
        Para mais informações, entre em contato conosco através do nosso e-mail:
        <strong>contato@saúdex.com.br</strong>.
      </p>
    </div>
  </footer>

 <script>
        // Adicionando efeito de clique suave
        document.querySelectorAll('.health-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    window.location.href = 'Medicina.php';
                }, 200);
            });
        });
   </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>