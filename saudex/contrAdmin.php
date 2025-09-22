<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// Acesso negado se o usuário não for admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo json_encode(['status' => 'erro', 'msg' => 'Acesso negado.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "clssaudex.php";
    $usuarios = new clssaudex();


    // Filtra a ação a ser executada
    $Acao       = filter_input(INPUT_POST, 'acao');

    
      // Filtra os dados de entrada
    $cod        = filter_input(INPUT_POST, "cod");
    $Nome       = filter_input(INPUT_POST, "Nome");
    $Senha      = filter_input(INPUT_POST, "Senha");
    $Email      = filter_input(INPUT_POST, "Email");
    $Telefone   = filter_input(INPUT_POST, "Telefone");
    $cep        = filter_input(INPUT_POST, "cep");
    $cpf        = filter_input(INPUT_POST, "cpf");
    $nasc       = filter_input(INPUT_POST, "nasc");
    $genero     = filter_input(INPUT_POST, "genero");
    

    // Hash da senha
    if (!empty($Senha)) {
        $usuarios->setSenha(password_hash($Senha, PASSWORD_DEFAULT));
    }

    // Passa os outros dados para o objeto
    $usuarios->setcod($cod);
    $usuarios->setNome($Nome);
    $usuarios->setEmail($Email);
    $usuarios->setTelefone($Telefone);
    $usuarios->setcep($cep);
    $usuarios->setcpf($cpf);
    $usuarios->setnasc($nasc);
    $usuarios->setgenero($genero);

    
    // Identifica e executa a ação
    switch ($Acao) {
        case 'Cadastrar':
            echo $usuarios->Cadastrar();
            break;
        case 'Excluir':
            if ($cod) {
                echo $usuarios->Excluir($cod);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'erro', 'msg' => 'ID do usuário não fornecido para exclusão.']);
            }
            break;
        case 'Editar':
            echo $usuarios->Editar();
            break;
        case 'Pesquisar':
            echo $usuarios->Pesquisar($cod, $Nome);
            break;
        case 'promover':
            if ($cod) {
                echo $usuarios->PromoverAdmin($cod);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'erro', 'msg' => 'ID do usuário não fornecido para promoção.']);
            }
            break;
        case 'rebaixar':
            if ($cod) {
                echo $usuarios->RebaixarUser($cod);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'erro', 'msg' => 'ID do usuário não fornecido para rebaixamento.']);
            }
            break;
        default:
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'msg' => 'Ação não reconhecida.']);
            break;
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'erro', 'msg' => 'Método de requisição não permitido.']);
}
?>