<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obesidade - Saúdex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/obesidade.css">
</head>
<body>
    <!-- Header -->
    <header class="sticky-top bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/logoVermelho.png" alt="Saúdex Logo" class="me-2 navbar-logo">
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
        <section class="hero-obesidade text-light py-5" style="background: linear-gradient(120deg, #ff914d, #ffb74d);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="hero-badge"><i class="fas fa-apple-alt me-2"></i>Saúde e Nutrição</span>
                        <h1 class="display-5 fw-bold mb-3">Compreendendo a Obesidade</h1>
                        <p class="lead mb-4">A obesidade é uma condição crônica caracterizada pelo acúmulo excessivo de gordura corporal, resultante do desequilíbrio entre a ingestão e o gasto de energia. Ela está associada a diversos problemas de saúde e requer atenção médica e multidisciplinar.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#causas" class="btn btn-light btn-lg">Ver Causas</a>
                            <a href="#tratamento" class="btn btn-outline-light btn-lg">Tratamentos</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fas fa-weight fa-10x opacity-75"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- O que é Obesidade -->
        <section class="info-section py-5">
            <div class="container">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="section-title">O que é Obesidade?</h2>
                    <p class="lead">A obesidade é mais do que uma questão estética — é uma doença crônica reconhecida pela Organização Mundial da Saúde (OMS). Ela ocorre quando o acúmulo de gordura corporal atinge níveis capazes de prejudicar a saúde física, emocional e social da pessoa.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h4>Fatores Alimentares</h4>
                            <p>O consumo frequente de alimentos ultraprocessados e bebidas açucaradas contribui para o aumento de peso corporal.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-dna"></i>
                            </div>
                            <h4>Fatores Genéticos e Hormonais</h4>
                            <p>Questões genéticas, metabólicas e hormonais podem influenciar o metabolismo e a forma como o corpo armazena gordura.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card p-4 text-center h-100">
                            <div class="card-icon">
                                <i class="fas fa-running"></i>
                            </div>
                            <h4>Estilo de Vida</h4>
                            <p>O sedentarismo é uma das principais causas do ganho de peso e deve ser combatido com atividades físicas regulares.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Causas e Sintomas -->
        <section id="causas" class="info-section bg-light py-5">
            <div class="container">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title text-center">Causas e Sintomas</h2>
                    <p class="text-center lead mb-5">A obesidade resulta da interação entre fatores genéticos, ambientais e comportamentais. Seus sintomas nem sempre são visíveis de imediato, mas os sinais podem se acumular com o tempo.</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-card p-4 h-100">
                                <h4 class="text-gradient mb-3"><i class="fas fa-seedling me-2"></i>Causas Comuns</h4>
                                <ul class="symptom-list">
                                    <li>Dieta rica em calorias, gorduras e açúcares</li>
                                    <li>Baixo nível de atividade física</li>
                                    <li>Fatores genéticos e familiares</li>
                                    <li>Distúrbios endócrinos (como hipotireoidismo)</li>
                                    <li>Uso de certos medicamentos</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-card p-4 h-100">
                                <h4 class="text-gradient mb-3"><i class="fas fa-heartbeat me-2"></i>Sintomas e Complicações</h4>
                                <ul class="symptom-list">
                                    <li>Fadiga e falta de ar</li>
                                    <li>Dores nas articulações e dificuldade de locomoção</li>
                                    <li>Aumento da pressão arterial</li>
                                    <li>Risco elevado de diabetes tipo 2</li>
                                    <li>Problemas de autoestima e ansiedade</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tratamento -->
        <section id="tratamento" class="info-section py-5">
            <div class="container">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title text-center">Opções de Tratamento</h2>
                    <p class="text-center lead mb-5">O tratamento da obesidade envolve uma combinação de medidas nutricionais, comportamentais, médicas e, em alguns casos, cirúrgicas.</p>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="info-card p-4 text-center h-100">
                                <div class="card-icon">
                                    <i class="fas fa-apple-alt"></i>
                                </div>
                                <h4>Reeducação Alimentar</h4>
                                <p>Adotar uma dieta equilibrada e supervisionada por um nutricionista é essencial para a perda e manutenção do peso.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-card p-4 text-center h-100">
                                <div class="card-icon">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h4>Atividade Física Regular</h4>
                                <p>Exercícios ajudam a aumentar o gasto calórico, melhorar a saúde cardiovascular e fortalecer o corpo.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-card p-4 text-center h-100">
                                <div class="card-icon">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <h4>Tratamento Médico</h4>
                                <p>Em casos graves, o uso de medicamentos ou a cirurgia bariátrica pode ser indicada por profissionais de saúde.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Importância da Prevenção -->
 <section class="info-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="emergency-card p-4 rounded">
                    <h3 class="text-warning"><i class="fas fa-apple-alt me-2"></i>Prevenção e Cuidados com a Obesidade</h3>
                    <p>A prevenção da obesidade envolve escolhas de vida saudáveis e acompanhamento médico regular:</p>
                    <ul class="treatment-list">
                        <li>Adote uma alimentação balanceada, rica em frutas, legumes e verduras.</li>
                        <li>Evite o consumo excessivo de alimentos ultraprocessados, ricos em açúcares e gorduras.</li>
                        <li>Pratique atividades físicas regularmente, pelo menos 150 minutos por semana.</li>
                        <li>Durma bem e mantenha uma rotina equilibrada para reduzir o estresse.</li>
                        <li>Realize check-ups periódicos e monitore seu peso e índice de massa corporal (IMC).</li>
                    </ul>
                    <p class="mt-3"><em>Pequenas mudanças de hábitos podem gerar grandes resultados na prevenção da obesidade e na melhoria da qualidade de vida.</em></p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="fade-in">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="mb-3">
                        <img src="img/logovermelho.png" alt="Saúdex Logo" height="40" class="me-2">
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
