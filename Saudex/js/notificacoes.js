document.addEventListener("DOMContentLoaded", () => {
  const contador = document.getElementById("contadorNotificacoes");
  const lista = document.getElementById("listaNotificacoes");

  function carregarNotificacoes() {
    fetch("notificacoes.php")
      .then(res => {
        if (!res.ok) throw new Error(`Erro HTTP: ${res.status}`);
        return res.json();
      })
      .then(data => {
        if (data.error) {
          console.error("Erro:", data.error);
          return;
        }

        // Atualiza contador
        contador.textContent = data.naoLidas > 0 ? data.naoLidas : "";

        // Atualiza lista
        lista.innerHTML = "";
        if (data.notificacoes.length === 0) {
          lista.innerHTML = '<li class="text-center text-muted small">Sem notificações</li>';
        } else {
          data.notificacoes.forEach(n => {
            const item = document.createElement("li");
            item.className = "dropdown-item small " + (n.lida ? "text-muted" : "fw-bold");
            item.textContent = n.mensagem;
            item.setAttribute("data-id", n.codNotificacao);
            lista.appendChild(item);
          });
        }

        // Animação do sino 
        if (data.naoLidas > 0) {
          const sino = document.getElementById("notificacoesDropdown");
          if (sino) {
            sino.classList.add("bell-animar");
            setTimeout(() => sino.classList.remove("bell-animar"), 1000);
          }
        }
      })
      .catch(err => console.error("Erro ao carregar notificações:", err));
  }

  carregarNotificacoes(); 
  setInterval(carregarNotificacoes, 10000); // Atualiza a cada 10s

  // Marcar como lidas ao clicar no sino
  document.getElementById("notificacoesDropdown")?.addEventListener("click", () => {
    fetch("notificacoes.php?acao=marcarLidas")
      .then(res => {
        if (!res.ok) throw new Error(`Erro HTTP: ${res.status}`);
        return res.json();
      })
      .then(data => {
        if (data.status === 'ok') {
          contador.textContent = ""; 
          carregarNotificacoes(); 
        }
      })
      .catch(err => console.error("Erro ao marcar como lidas:", err));
  });

  // Marcar notificação como lida ao clicar na notificação específica
  lista.addEventListener("click", function(event) {
    const item = event.target.closest('li');
      if (item && !item.classList.contains('text-muted')) {
      const idNotificacao = item.getAttribute('data-id'); // Obter o ID da notificação

    fetch(`notificacoes.php?acao=marcarLidas&id=${idNotificacao}`)
      .then(res => {
        if (!res.ok) throw new Error(`Erro HTTP: ${res.status}`);
        return res.json();
      })
      .then(data => {
        if (data.status === 'ok') {
          item.classList.add('text-muted');  // Marca a notificação como lida (muda a cor)
          contador.textContent = ""; // Resetar o contador
          carregarNotificacoes(); // Recarregar as notificações
        }
      })
      .catch(err => console.error("Erro ao marcar como lidas:", err));
  }
});
});