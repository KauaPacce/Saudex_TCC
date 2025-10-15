<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes - Saúdex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/diabetes.css">
</head>
<body>
    <!-- Header -->
    <header class="sticky-top bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/logoVerde.png" alt="Saúdex Logo" class="me-2 navbar-logo">
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
        <section class="hero-diabetes">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="hero-badge"><i class="fas fa-syringe me-2"></i>Saúde Metabólica</span>
                        <h1 class="display-5 fw-bold mb-3">Compreendendo a Diabetes</h1>
                        <p class="lead mb-4">A diabetes é uma condição crônica caracterizada pelo aumento dos níveis de glicose no sangue, causada pela produção insuficiente ou pela má utilização da insulina pelo corpo.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#sintomas" class="btn btn-light btn-lg">Ver Sintomas</a>
                            <a href="#tratamento" class="btn btn-outline-light btn-lg">Opções de Tratamento</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fas fa-hand-holding-medical fa-10x opacity-75"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- O que é Diabetes -->
        <section class="info-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="section-title">O que é Diabetes?</h2>
                        <p class="lead">A diabetes é uma doença metabólica em que o corpo não produz insulina suficiente ou não consegue utilizá-la adequadamente, resultando em altos níveis de açúcar no sangue. Existem diferentes tipos, sendo os principais a diabetes tipo 1 e tipo 2.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-dna"></i>
                            </div>
                            <h4>Tipos de Diabetes</h4>
                            <p>Os tipos mais comuns são o tipo 1 (autoimune) e o tipo 2 (resistência à insulina). Há também a diabetes gestacional, que ocorre durante a gravidez.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-apple-alt"></i>
                            </div>
                            <h4>Controle Diário</h4>
                            <p>O controle envolve alimentação equilibrada, atividade física regular, monitoramento da glicemia e, em alguns casos, uso de medicamentos.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h4>Condição Tratável</h4>
                            <p>Com acompanhamento médico e hábitos saudáveis, é possível viver bem e prevenir complicações associadas à diabetes.</p>
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
                        <h2 class="section-title text-center">Sinais e Sintomas de Diabetes</h2>
                        <p class="text-center lead mb-5">Os sintomas podem variar conforme o tipo de diabetes. Identificar precocemente os sinais é essencial para iniciar o tratamento adequado.</p>
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="info-card p-4 h-100">
                                    <h4 class="text-gradient mb-3"><i class="fas fa-user-nurse me-2"></i>Sintomas Iniciais</h4>
                                    <ul class="symptom-list">
                                        <li>Sede excessiva e boca seca</li>
                                        <li>Fome constante</li>
                                        <li>Urinar com frequência</li>
                                        <li>Cansaço e fraqueza</li>
                                        <li>Perda de peso sem causa aparente</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card p-4 h-100">
                                    <h4 class="text-gradient mb-3"><i class="fas fa-stethoscope me-2"></i>Sintomas Avançados</h4>
                                    <ul class="symptom-list">
                                        <li>Visão embaçada</li>
                                        <li>Feridas que demoram a cicatrizar</li>
                                        <li>Infecções frequentes</li>
                                        <li>Formigamento em mãos e pés</li>
                                        <li>Alterações de humor e sonolência</li>
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
                        <p class="text-center lead mb-5">O tratamento da diabetes envolve uma combinação de cuidados médicos, hábitos saudáveis e, quando necessário, uso de insulina ou medicamentos orais.</p>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <h4>Alimentação Balanceada</h4>
                                    <p>Uma dieta rica em fibras, com baixo teor de açúcares e gorduras, é essencial para manter a glicemia controlada.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-running"></i>
                                    </div>
                                    <h4>Atividade Física</h4>
                                    <p>Exercícios regulares ajudam a controlar os níveis de glicose, melhorar a sensibilidade à insulina e manter o peso saudável.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-syringe"></i>
                                    </div>
                                    <h4>Medicação e Insulina</h4>
                                    <p>Alguns pacientes necessitam de medicamentos ou insulina, prescritos por um endocrinologista, para o controle eficaz da doença.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Prevenção -->
        <section class="info-section py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="emergency-card p-4 rounded">
                            <h3 class="text-success"><i class="fas fa-leaf me-2"></i>Prevenção e Cuidados</h3>
                            <p>A prevenção da diabetes tipo 2 é possível com hábitos saudáveis:</p>
                            <ul class="treatment-list">
                                <li>Alimente-se de forma equilibrada e evite o consumo excessivo de açúcares.</li>
                                <li>Pratique atividades físicas regularmente.</li>
                                <li>Monitore seus níveis de glicose e faça check-ups periódicos.</li>
                                <li>Evite o tabagismo e reduza o consumo de álcool.</li>
                            </ul>
                            <p class="mt-3"><em>Cuidar da sua saúde hoje é o melhor caminho para um futuro com qualidade de vida.</em></p>
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
                        <img src="img/logoVerde.png" alt="Saúdex Logo" height="40" class="me-2">
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
                          <a href="Depressao.php" class="mb-2">Depressão</a>
                        <a href="Ansiedade.php" class="mb-2">Ansiedade</a>
                        <a href="Obesidade.php" class="mb-2">Obesidade</a>
                        <a href="Diabetes.php" class="mb-2">Diabetes</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
