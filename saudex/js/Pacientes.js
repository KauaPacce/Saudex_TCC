//===CADASTRO DE usuarios =========================================
function Cadastrar()
{
    // 1 parte: pegar dados do formulario
    var DadosForm = $('#cadastro').serialize();

    // 2 parte: congelar a tela e executar php
    $.ajax({
        method: 'GET',
        url: 'contrPacientes.php?acao=Cadastrar',
        data: DadosForm,
        
        beforeSend: function() {
            $("h2").html("Inclusao em andamento ...");
        }
    })

    // 3 parte: receber msg vindo php e mostrar
    .done(function(msgPHP){
        $("h2").html("Retorno da Inclusao...");
        $("#resposta").html(msgPHP);

        alert(msgPHP);
    })

    .fail(function(){
        alert("falha no processo Inclusao");
    })

    return false;
}


//===EXCLUSAO DE usuarios =========================================
function Excluir()
{
    var DadosForm = $('#cadastro').serialize();

    $.ajax({
        method: 'GET',
        url: 'contrPacientes.php?acao=Excluir',
        data: DadosForm
    })

    .done(function(msgPHP){
        alert(msgPHP);
    })

    .fail(function(){
        alert("falha na exclusao");
    })

    return false;
}


//===ALTERAR DE usuarios =========================================
function Editar()
{
    var DadosForm = $('#cadastro').serialize();

    $.ajax({
        method: 'GET',
        url: 'contrPacientes.php?acao=Editar',
        data: DadosForm
    })

    .done(function(msgPHP){
        alert(msgPHP);
    })

    .fail(function(){
        alert("falha na alteracao");
    })

    return false;
}

//===PESQUISA DE usuarios =========================================
function Pesquisar()
{
    // 1 parte: pegar dados do formulario
    var DadosForm = $('#cadastro').serialize();

    // 2 parte: congelar a tela e executar php
    $.ajax({
        method: 'GET',
        url: 'contrPacientes.php?acao=Pesquisar',
        data: DadosForm,
        
        beforeSend: function() {
            $("h2").html("Carregando consulta...");
        }
    })

    

    // 3 parte: receber dados vindo php e mostrar
    .done(function(dadosPHP){

        $("h2").html("Dados da Pesquisa...");
        var usuarios = JSON.parse(dadosPHP);

        //Consulta em Tabela -----------------------------------------
        var Tabela = '';
        Tabela += "<table border=1>";

        Tabela += "<tr> <th>cod</th> <th>Nome</th> <th>Senha</th> <th>Email</th> <th>Telefone</th> <th>cpf</th> <th>cep</th> <th>nasc</th> <th>genero</th> </tr>";
            for(i = 0; i < usuarios.length; i++) {
                Tabela += "<tr>";
                    Tabela += "<td>" + usuarios[i].cod       + "</td>";
                    Tabela += "<td>" + usuarios[i].Nome      + "</td>";
                    Tabela += "<td>" + usuarios[i].Senha     + "</td>";
                    Tabela += "<td>" + usuarios[i].Email     + "</td>";
                    Tabela += "<td>" + usuarios[i].Telefone  + "</td>";
                    Tabela += "<td>" + usuarios[i].cpf       + "</td>";
                    Tabela += "<td>" + usuarios[i].cep       + "</td>";
                    Tabela += "<td>" + usuarios[i].nasc      + "</td>";
                    Tabela += "<td>" + usuarios[i].genero    + "</td>";
                Tabela += "</tr>";
            }
        Tabela += "</table>";

        $("#resposta").append(Tabela);

    })

    .fail(function(){
        alert("falha no processo Pesquisa");
    })

    return false;
}

$("#resposta2").html('<input type="button" value="Imprima essa página" onclick="window.print();" />');
//===IMPRESSAO DE PDF =========================================
function Imprimir()
{
   
document.write('<form action="usuariosImp.php"><input type="submit" value="Listagem"></form>');

}

//===GERAÇÃO DE GRAFICO =========================================
function Grafico() 
{
document.write('<form action="grf.php"><input type="submit" value="Gráfico"></form>');  
}