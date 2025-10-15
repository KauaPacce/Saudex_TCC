<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saúdex - Seu Portal de Saúde</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --green: #10b981;
      --green-dark: #059669;
      --bg-gradient: linear-gradient(135deg, #ecfdf5, #d1fae5);
      --text-color: #333;
      --radius: 16px;
    }

    body {
      min-height: 100vh;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: var(--bg-gradient);
      color: var(--text-color);
      display: flex;
      flex-direction: column;
    }

    header {
      text-align: center;
      background-color: #fff;
      padding: 2rem;
      border-radius: 0 0 var(--radius) var(--radius);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    header h1 {
      color: var(--green-dark);
      margin-bottom: 1.5rem;
      font-size: 2.4rem;
    }

    nav {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 1rem;
    }

    nav a {
      text-decoration: none;
      color: #fff;
      background-color: var(--green);
      padding: 0.8rem 1.8rem;
      border-radius: var(--radius);
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
    }

    nav a:hover {
      background-color: var(--green-dark);
      transform: translateY(-3px);
      box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
    }

    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    /* ===== CARD PRINCIPAL ===== */
    .info-card {
      background-color: #ffffff;
      padding: 3rem 2rem;
      border-radius: var(--radius);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      text-align: center;
    }

    .info-card h2 {
      color: var(--green-dark);
      margin-bottom: 1.5rem;
      font-size: 2rem;
    }

    .info-card p {
      margin-bottom: 1rem;
      line-height: 1.7;
      font-size: 1.05rem;
    }

    .info-card strong {
      color: var(--green-dark);
    }

    /* ===== BOTÃO ===== */
    .btn-visit {
      display: inline-block;
      background-color: var(--green);
      color: white;
      padding: 0.9rem 2.2rem;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      margin-top: 1.5rem;
      transition: all 0.3s ease;
    }

    .btn-visit:hover {
      background-color: var(--green-dark);
      transform: translateY(-3px);
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
    }

    footer {
      text-align: center;
      padding: 1rem;
      background-color: #ffffff;
      color: #666;
      font-size: 0.9rem;
      border-top: 1px solid #ddd;
    }

    @media (max-width: 600px) {
      header {
        padding: 1.5rem;
      }

      nav a {
        font-size: 1rem;
        padding: 0.7rem 1.4rem;
      }

      .info-card {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>

<body>
  <main>
    <div class="info-card">
      <h2>Bem-vindo ao Saúdex!</h2>
      <p><strong>Saúdex</strong> é um portal dedicado à saúde e ao bem-estar. Nosso objetivo é tornar o acesso à informação médica mais simples, confiável e acessível para todos.</p>
      <p>Oferecemos conteúdos sobre alimentação saudável, atividade física, prevenção de doenças e equilíbrio emocional, tudo com base em recomendações científicas e orientação de profissionais da área da saúde.</p>
      <p>Além disso, o sistema da Saúdex permite que você acompanhe cronogramas, registre suas metas e gerencie seu progresso de forma prática.</p>
      <p><em><strong>"Cuidar de você é a nossa prioridade, porque viver bem é viver com saúde."</strong></em></p>

      <a href="Menu.php" class="btn-visit">Visitar o Site</a>
      <a href="formAdmin.php" class="btn-visit">Área Admin</a>
      <a href="cronograma.php" class="btn-visit">Cronograma</a>
    </div>
  </main>

  <footer>
    <p>© 2025 Saúdex - Todos os direitos reservados.</p>
  </footer>
</body>
</html>
