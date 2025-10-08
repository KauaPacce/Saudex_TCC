//===MÁSCARAS =========================================
$(document).ready(function(){ 
    $('#cpf').mask('000.000.000-00');
    $('#Telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
});

// Função genérica para requisições AJAX
function enviarRequisicao(acao, dados, sucessoCallback) {
    $.ajax({
        method: 'POST',
        url: 'contrAdmin.php',
        data: { acao: acao, ...dados },
        beforeSend: function() {
            // Mostrar um indicador de carregamento, se necessário
        },
        success: function(response) {
            try {
                let resultado = JSON.parse(response);
                if (resultado.status === 'sucesso') {
                    if (sucessoCallback) {
                        sucessoCallback(resultado);
                    }
                } else {
                    alert('Erro: ' + resultado.msg);
                }
            } catch (e) {
                alert('Erro na resposta do servidor: ' + response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Falha na requisição: ' + textStatus);
        }
    });
}

//===CADASTRO DE USUÁRIOS =========================================
function Cadastrar() {
    let dados = $('#controle').serializeArray().reduce(function(obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    
    enviarRequisicao('Cadastrar', dados, function(resultado) {
        alert(resultado.msg);
        carregarUsuarios();
    });
    return false;
}

//===EXCLUSAO DE USUÁRIOS =========================================
function Excluir() {
    let cod = $('#cod').val();
    if (!cod) {
        alert("Por favor, digite o codigo do usuário para exclusão.");
        return;
    }

    if (confirm('Tem certeza que deseja excluir o usuário de codigo ' + cod + '?')) {
        enviarRequisicao('Excluir', { cod: cod }, function(resultado) {
            alert(resultado.msg);
            carregarUsuarios();
        });
    }
    return false;
}

function excluirUsuario(cod) {
    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        enviarRequisicao('Excluir', { cod: cod }, function(resultado) {
            alert(resultado.msg);
            carregarUsuarios();
        });
    }
}

//===ALTERAÇÃO DE USUÁRIOS =========================================
function Editar() {
    let dados = $('#controle').serializeArray().reduce(function(obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    
    if (!dados.cod) {
        alert("Por favor, digite o codigo do usuário para edição.");
        return;
    }

    enviarRequisicao('Editar', dados, function(resultado) {
        alert(resultado.msg);
        carregarUsuarios();
    });
    return false;
}

//===PESQUISA DE USUÁRIOS =========================================
function Pesquisar() {
    let cod = $('#cod').val();
    let nome = $('#Nome').val();

    if (!cod && !nome) {
        alert("Por favor, digite um codigo ou um nome para a pesquisa.");
        return;
    }

    enviarRequisicao('Pesquisar', { cod: cod, Nome: nome }, function(resultado) {
        let tabelaHtml = '<table border="1"><thead><tr><th>Cod</th><th>Nome</th><th>Email</th><th>Telefone</th><th>CPF</th><th>CEP</th><th>Nascimento</th><th>Gênero</th><th>Role</th><th>Ações</th></tr></thead><tbody>';
        resultado.data.forEach(usuario => {
            let acoes = '';
            if (usuario.role === 'admin') {
                acoes += `<a href="#" class="btn-rebaixar" onclick="rebaixarUser(${usuario.cod}); return false;">Rebaixar</a>`;
            } else {
                acoes += `<a href="#" class="btn-promover" onclick="promoverAdmin(${usuario.cod}); return false;">Promover</a>`;
            }
            acoes += `<a href="#" class="btn-excluir" onclick="excluirUsuario(${usuario.cod}); return false;">Excluir</a>`;
            
            tabelaHtml += `<tr>
                <td>${usuario.cod}</td>
                <td>${usuario.Nome}</td>
                <td>${usuario.Email}</td>
                <td>${usuario.Telefone || ''}</td>
                <td>${usuario.cpf || ''}</td>
                <td>${usuario.cep || ''}</td>
                <td>${usuario.nasc || ''}</td>
                <td>${usuario.genero || ''}</td>
                <td>${usuario.role}</td>
                <td>${acoes}</td>
            </tr>`;
        });
        tabelaHtml += '</tbody></table>';
        $("#resposta").html(tabelaHtml);
    });
    return false;
}

//===AÇÕES DE ADMIN =========================================
function promoverAdmin(cod) {
    if (confirm('Tem certeza que deseja promover este usuário a admin?')) {
        enviarRequisicao('promover', { cod: cod }, function(resultado) {
            alert(resultado.msg);
            carregarUsuarios(); 
        });
    }
}

function rebaixarUser(cod) {
    if (confirm('Tem certeza que deseja rebaixar este usuário?')) {
        enviarRequisicao('rebaixar', { cod: cod }, function(resultado) {
            alert(resultado.msg);
            carregarUsuarios(); 
        });
    }
}

function carregarUsuarios() {
    $.ajax({
        type: 'POST',
        url: 'contrAdmin.php',
        data: { acao: 'Pesquisar', Nome: '' }, 
        success: function(response) {
            try {
                let usuarios = JSON.parse(response);
                let tabelaHtml = '<h3>Lista de Usuários</h3><table border="1"><thead><tr><th>Cod</th><th>Nome</th><th>Email</th><th>Role</th><th>Ações</th></tr></thead><tbody id="lista-usuarios">';
                usuarios.data.forEach(usuario => {
                    let acoes = '';
                    if (usuario.role === 'admin') {
                        acoes += `<button onclick="rebaixarUser(${usuario.cod})">Rebaixar</button>`;
                    } else {
                        acoes += `<button onclick="promoverAdmin(${usuario.cod})">Promover</button>`;
                    }
                    acoes += ` <button onclick="excluirUsuario(${usuario.cod})">Excluir</button>`;
                    
                    tabelaHtml += `<tr>
                        <td>${usuario.cod}</td>
                        <td>${usuario.Nome}</td>
                        <td>${usuario.Email}</td>
                        <td>${usuario.role}</td>
                        <td>${acoes}</td>
                    </tr>`;
                });
                tabelaHtml += '</tbody></table>';
                $("#resposta").html(tabelaHtml);
            } catch(e) {
                alert('Erro ao carregar usuários: ' + response);
            }
        },
        error: function() {
            alert('Erro ao carregar usuários.');
        }
    });
}
