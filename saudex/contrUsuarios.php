<?php

// identificando arq. onde esta a classe e instanciando a classe
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include "clssaudex.php";
$usuarios = new clssaudex();

//-- Recebendo dados do formulario
$Nome       = filter_input(INPUT_POST, "Nome");
$Senha      = filter_input(INPUT_POST, "Senha");
$Email      = filter_input(INPUT_POST, "Email");
$Telefone   = filter_input(INPUT_POST, "Telefone");
$cep        = filter_input(INPUT_POST, "cep");
$cpf        = filter_input(INPUT_POST, "cpf");
$nasc       = filter_input(INPUT_POST, "nasc");
$genero     = filter_input(INPUT_POST, "genero");
$Acao       = filter_input(INPUT_POST, 'acao');


//-- Enviando para dentro da classe nos atributos
$usuarios->setNome($Nome);
$usuarios->setSenha(password_hash($Senha, PASSWORD_DEFAULT)); // Criptografar a senha
$usuarios->setEmail($Email);
$usuarios->setTelefone($Telefone);
$usuarios->setcep($cep);
$usuarios->setcpf($cpf);
$usuarios->setnasc($nasc);
$usuarios->setgenero($genero);



//-- identificando qual ação executar 
$Acao = $_POST['acao'];

switch ($Acao) 
{
    case 'Cadastrar':
        echo $usuarios->Cadastrar();
        break;
    case 'Excluir':
        echo $usuarios->Excluir();
        break;
    case 'Editar':
        echo $usuarios->Editar();
        break;
    case 'Pesquisar':
        echo $usuarios->Pesquisar();
        break;  
    default:
        echo 'acao invalida';      
}
}
?>