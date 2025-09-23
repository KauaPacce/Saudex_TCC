<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depressão - Saúdex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/depressao.css">
</head>
<body>
    <!-- Header -->
    <header class="sticky-top bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/logo_saudex.png" alt="Saúdex Logo" height="141" class="me-2">
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
        <!-- Hero Section Depressão -->
        <section class="hero-depressao">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="hero-badge"><i class="fas fa-brain me-2"></i>Saúde Mental</span>
                         <h1 class="display-5 fw-bold mb-3">Compreendendo a Depressão</h1>
                         <p class="lead mb-4">A depressão é uma condição médica tratável que afeta milhões de pessoas. Entender seus sinais, sintomas e opções de tratamento é o primeiro passo para a recuperação.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#sintomas" class="btn btn-light btn-lg">Ver Sintomas</a>
                            <a href="#tratamento" class="btn btn-outline-light btn-lg">Opções de Tratamento</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fas fa-cloud-rain fa-10x opacity-75"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- O que é Depressão -->
        <section class="info-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="section-title">O que é Depressão?</h2>
                        <p class="lead">A depressão é um transtorno mental comum caracterizado por tristeza persistente, perda de interesse em atividades e diminuição da energia. É uma condição médica séria que requer compreensão e tratamento adequado.</p>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h4>Não é Fraqueza</h4>
                            <p>A depressão é uma condição médica real, não um sinal de fraqueza pessoal ou algo que possa ser superado apenas com força de vontade.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <h4>Condição Tratável</h4>
                            <p>Com o tratamento adequado, a maioria das pessoas com depressão pode melhorar significativamente e retomar suas atividades normais.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4>Afeta Muitos</h4>
                            <p>Estima-se que mais de 300 milhões de pessoas em todo o mundo sofrem de depressão, tornando-se uma das principais causas de incapacidade.</p>
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
                        <h2 class="section-title text-center">Sinais e Sintomas da Depressão</h2>
                        <p class="text-center lead mb-5">Os sintomas da depressão podem variar de leves a graves e podem incluir uma combinação de sintomas emocionais e físicos. Se você ou alguém que você conhece está experimentando vários desses sintomas por mais de duas semanas, é importante procurar ajuda profissional.</p>
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="info-card p-4 h-100">
                                    <h4 class="text-gradient mb-3"><i class="fas fa-exclamation-circle me-2"></i>Sintomas Emocionais</h4>
                                    <ul class="symptom-list">
                                        <li>Tristeza persistente, ansiedade ou vazio</li>
                                        <li>Sentimentos de desesperança ou pessimismo</li>
                                        <li>Irritabilidade, frustração ou inquietação</li>
                                        <li>Sentimentos de culpa, inutilidade ou desamparo</li>
                                        <li>Perda de interesse ou prazer em hobbies e atividades</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card p-4 h-100">
                                    <h4 class="text-gradient mb-3"><i class="fas fa-bed me-2"></i>Sintomas Físicos</h4>
                                    <ul class="symptom-list">
                                        <li>Fadiga e diminuição de energia</li>
                                        <li>Dificuldade de concentração, memória ou tomada de decisões</li>
                                        <li>Insônia ou sono excessivo</li>
                                        <li>Mudanças no apetite ou peso</li>
                                        <li>Dores inexplicáveis, dores de cabeça ou problemas digestivos</li>
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
                        <p class="text-center lead mb-5">O tratamento da depressão geralmente envolve uma combinação de terapias. Consulte um profissional de saúde para determinar a abordagem mais adequada para você.</p>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <h4>Psicoterapia</h4>
                                    <p>A terapia conversacional pode ajudar a identificar e mudar padrões de pensamento negativos e desenvolver habilidades de enfrentamento.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-pills"></i>
                                    </div>
                                    <h4>Medicação</h4>
                                    <p>Antidepressivos podem ajudar a modificar a química cerebral relacionada ao humor. São mais eficazes quando combinados com terapia.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card p-4 text-center h-100">
                                    <div class="card-icon">
                                        <i class="fas fa-heartbeat"></i>
                                    </div>
                                    <h4>Mudanças no Estilo de Vida</h4>
                                    <p>Exercício regular, dieta balanceada, sono adequado e redução do estresse podem complementar o tratamento profissional.</p>
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
                            <p>Se você ou alguém que você conhece está em crise ou tendo pensamentos suicidas, procure ajuda imediatamente:</p>
                            <ul class="treatment-list">
                                <li><strong>CVV - Centro de Valorização da Vida:</strong> 188 (ligação gratuita)</li>
                                <li><strong>SAMU:</strong> 192</li>
                                <li><strong>Emergência:</strong> 190</li>
                                <li>Procure o pronto-socorro mais próximo</li>
                            </ul>
                            <p class="mt-3"><em>Lembre-se: pedir ajuda é um sinal de força, não de fraqueza.</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Recursos Adicionais -->
        <section class="info-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2 class="section-title text-center">Recursos e Apoio</h2>
                        <p class="text-center lead mb-5">Existem muitos recursos disponíveis para ajudar aqueles que vivem com depressão. Aqui estão alguns lugares onde você pode encontrar apoio e informações adicionais.</p>   
                        <div class="resource-card p-4 rounded mt-4">
                            <h4><i class="fas fa-hands-helping me-2"></i>Onde Buscar Ajuda</h4>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h5>Profissionais de Saúde</h5>
                                    <ul class="treatment-list">
                                        <li>Psiquiatras</li>
                                        <li>Psicólogos</li>
                                        <li>Clínicos gerais</li>
                                        <li>Terapeutas</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Serviços de Apoio</h5>
                                    <ul class="treatment-list">
                                        <li>CAPS - Centros de Atenção Psicossocial</li>
                                        <li>Postos de Saúde da Família</li>
                                        <li>Hospitais universitários</li>
                                        <li>Clínicas-escola de psicologia</li>
                                    </ul>
                                </div>
                            </div>
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
                        <img src="img/logo_saudex.png" alt="Saúdex Logo" height="40" class="me-2">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>