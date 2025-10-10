<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ansiedade - Saúdex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/ansiedade.css">
</head>
<body>
    <!-- Header -->
    <header class="sticky-top bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/logoLaranja.png" alt="Saúdex Logo" class="me-2 navbar-logo">
                </a>
                <div class="d-flex">
                    <a href="Menu.php" class="nav-btn btn-outline-primary">Início</a>
                    <a href="Ultimas-noticias.php" class="nav-btn btn-outline-primary">Notícias</a>
                    <a href="perfil.php" class="nav-btn btn-outline-primary">Perfil</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-ansiedade">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="hero-badge"><i class="fas fa-heartbeat me-2"></i>Saúde Mental</span>
                        <h1 class="display-5 fw-bold mb-3">Entendendo a Ansiedade</h1>
                        <p class="lead mb-4">A ansiedade é uma resposta natural do corpo ao estresse. No entanto, quando se torna intensa, persistente e interfere nas atividades diárias, pode ser considerada um transtorno de ansiedade.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#sintomas" class="btn btn-light btn-lg">Ver Sintomas</a>
                            <a href="#tratamento" class="btn btn-outline-light btn-lg">Opções de Tratamento</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fas fa-hand-holding-heart fa-10x opacity-75"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- O que é Ansiedade -->
        <section class="info-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="section-title">O que é Ansiedade?</h2>
                        <p class="lead">A ansiedade é uma emoção humana normal que envolve sentimentos de tensão, preocupação e alterações físicas, como aumento da frequência cardíaca. Quando esses sintomas são intensos, frequentes e desproporcionais, configuram um transtorno de ansiedade — uma condição clínica reconhecida e tratável.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <h4>Reação Natural</h4>
                            <p>A ansiedade em pequenas doses é uma resposta saudável que ajuda o corpo a reagir a desafios ou perigos.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h4>Quando se Torna um Problema</h4>
                            <p>Quando é excessiva, constante e causa sofrimento significativo, pode se tornar um transtorno de ansiedade.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <h4>Tratável</h4>
                            <p>Transtornos de ansiedade são tratáveis com acompanhamento médico, psicoterapia e, em alguns casos, medicação.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sintomas -->
        <section id="sintomas" class="info-section bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2 class="section-title text-center">Sinais e Sintomas de Ansiedade</h2>
                        <p class="text-center lead mb-5">Os sintomas podem variar em intensidade e duração, afetando tanto o corpo quanto a mente. Caso esses sinais persistam por mais de algumas semanas, é fundamental procurar orientação profissional.</p>
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="info-card p-4 h-100">
                                    <h4 class="text-gradient mb-3"><i class="fas fa-user-ninja me-2"></i>Sintomas Emocionais</h4>
                                    <ul class="symptom-list">
                                        <li>Preocupação excessiva e constante</li>
                                        <li>Sensação de medo ou apreensão intensa</li>
                                        <li>Irritabilidade e dificuldade de concentração</li>
                                        <li>Medo de perder o controle ou de algo ruim acontecer</li>
                                        <li>Insônia ou sono não restaurador</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card p-4 h-100">
                                    <h4 class="text-gradient mb-3"><i class="fas fa-heartbeat me-2"></i>Sintomas Físicos</h4>
                                    <ul class="symptom-list">
                                        <li>Batimentos cardíacos acelerados (taquicardia)</li>
                                        <li>Tremores, suor excessivo e sensação de falta de ar</li>
                                        <li>Tensão muscular e dores de cabeça</li>
                                        <li>Problemas digestivos (náusea, diarreia)</li>
                                        <li>Tontura e sensação de desmaio</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tratamento -->
        <section id="tratamento" class="info-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2 class="section-title text-center">Opções de Tratamento</h2>
                        <p class="text-center lead mb-5">O tratamento do transtorno de ansiedade é eficaz e deve ser personalizado. Inclui abordagens psicológicas, médicas e comportamentais.</p>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <h4>Terapia Cognitivo-Comportamental</h4>
                                    <p>A TCC é uma forma comprovada de psicoterapia que ajuda a identificar e modificar padrões de pensamento que geram ansiedade.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-pills"></i>
                                    </div>
                                    <h4>Medicação</h4>
                                    <p>Ansiolíticos e antidepressivos podem ser prescritos por um médico psiquiatra para equilibrar a química cerebral e aliviar os sintomas.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-spa"></i>
                                    </div>
                                    <h4>Hábitos Saudáveis</h4>
                                    <p>Atividade física, técnicas de respiração, boa alimentação e sono regular são fundamentais no controle da ansiedade.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ajuda Imediata -->
        <section class="info-section py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="emergency-card p-4 rounded">
                            <h3 class="text-warning"><i class="fas fa-exclamation-triangle me-2"></i>Precisa de Ajuda Imediata?</h3>
                            <p>Se você ou alguém que você conhece está passando por uma crise de ansiedade intensa ou pensamentos autodestrutivos, procure ajuda imediatamente:</p>
                            <ul class="treatment-list">
                                <li><strong>CVV - Centro de Valorização da Vida:</strong> 188 (ligação gratuita)</li>
                                <li><strong>SAMU:</strong> 192</li>
                                <li><strong>Emergência:</strong> 190</li>
                                <li>Procure o pronto-socorro mais próximo</li>
                            </ul>
                            <p class="mt-3"><em>Buscar ajuda é um ato de coragem e autocuidado.</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="fade-in">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="mb-3">
                        <img src="img/logoLaranja.png" alt="Saúdex Logo" height="40" class="me-2">
                    </div>
                    <p class="text-light">Sua plataforma de confiança para informações de saúde baseadas em evidências científicas.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Links Rápidos</h5>
                    <div class="footer-links d-flex flex-column">
                        <a href="Informacoes.php" class="mb-2">Medicina</a>
                        <a href="Ultimas-noticias.php" class="mb-2">Notícias</a>
                        <a href="formUsuarios.php" class="mb-2">Cadastrar</a>
                        <a href="formLogin.php" class="mb-2">Entrar</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Condições</h5>
                    <div class="footer-links d-flex flex-column">
                        <a href="Depressao.php">Depressão</a>
                        <a href="#">Ansiedade</a>
                        <a href="#">Obesidade</a>
                        <a href="#">Diabetes</a>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="mb-3">Contato</h5>
                    <p><i class="fas fa-envelope me-2"></i> contato@saudex.com</p>
                    <p><i class="fas fa-phone me-2"></i> (11) 9999-9999</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
