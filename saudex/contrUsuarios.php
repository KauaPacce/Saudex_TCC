<?php
// Incluindo as classes do PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// identificando arq. onde esta a classe e instanciando a classe
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Incluindo o autoloader do Composer
require 'vendor/autoload.php';

include "clssaudex.php";
$usuarios = new clssaudex();


// Filtra a ação a ser executada
$Acao = filter_input(INPUT_POST, 'acao'); 

//-- identificando qual ação executar 
switch ($Acao) 
{
    case 'Cadastrar':
        // Recebendo e setando dados apenas para Cadastrar
        $Nome       = filter_input(INPUT_POST, "Nome");
        $Senha      = filter_input(INPUT_POST, "Senha");
        $Email      = filter_input(INPUT_POST, "Email");
        $Telefone   = filter_input(INPUT_POST, "Telefone");
        $cep        = filter_input(INPUT_POST, "cep");
        $cpf        = filter_input(INPUT_POST, "cpf");
        $nasc       = filter_input(INPUT_POST, "nasc");
        $genero     = filter_input(INPUT_POST, "genero");
        
        $usuarios->setNome($Nome);
        $usuarios->setSenha(password_hash($Senha, PASSWORD_DEFAULT));
        $usuarios->setEmail($Email);
        $usuarios->setTelefone($Telefone);
        $usuarios->setcep($cep);
        $usuarios->setcpf($cpf);
        $usuarios->setnasc($nasc);
        $usuarios->setgenero($genero);
        
        $resultadoJson = $usuarios->Cadastrar();
        
        $resultado = json_decode($resultadoJson, true);
        
        // Verifica se a resposta é válida e contém o código do novo usuário
        if (isset($resultado['status']) && $resultado['status'] === 'sucesso' && isset($resultado['cod'])) {
            $codNovoUsuario = $resultado['cod'];
            
            $NomeUsuario = $usuarios->getNome(); 
            
            // insere uma notificação de boas-vindas
            $mensagem = "Bem-vindo ao Saúdex, " . htmlspecialchars($NomeUsuario) . "!";
            $usuarios->InserirNotificacao($codNovoUsuario, $mensagem);
        }
        echo $resultadoJson; 
        break;
    case 'Excluir':
        $cod = filter_input(INPUT_POST, 'cod');
        echo $usuarios->Excluir($cod);
        break;
    case 'Editar':
        // Recebendo e setando dados apenas para Editar
        $cod        = filter_input(INPUT_POST, "cod");
        $Nome       = filter_input(INPUT_POST, "Nome");
        $Senha      = filter_input(INPUT_POST, "Senha"); 
        $Email      = filter_input(INPUT_POST, "Email");
        $Telefone   = filter_input(INPUT_POST, "Telefone");
        $cep        = filter_input(INPUT_POST, "cep");
        $cpf        = filter_input(INPUT_POST, "cpf");
        $nasc       = filter_input(INPUT_POST, "nasc");
        $genero     = filter_input(INPUT_POST, "genero");
        
        $usuarios->setcod($cod); 
        $usuarios->setNome($Nome);
        if (!empty($Senha)) { 
            $usuarios->setSenha(password_hash($Senha, PASSWORD_DEFAULT));
        } else {
            // Garante que a senha não seja setada como vazia se não foi fornecida
            $usuarios->setSenha(null); 
        }
        $usuarios->setEmail($Email);
        $usuarios->setTelefone($Telefone);
        $usuarios->setcep($cep);
        $usuarios->setcpf($cpf);
        $usuarios->setnasc($nasc);
        $usuarios->setgenero($genero);
        
        echo $usuarios->Editar();
        break;
    case 'Pesquisar':
        $codFiltro = filter_input(INPUT_POST, 'codFiltro');
        $NomeFiltro = filter_input(INPUT_POST, 'NomeFiltro');
        echo $usuarios->Pesquisar($codFiltro, $NomeFiltro);
        break;
        
    case 'ForgotPassword':  
            $Email = filter_input(INPUT_POST, "Email");
        if (!$Email) {
            echo json_encode(['status' => 'erro', 'mensagem' => 'E-mail não fornecido']);
        break;
            }
            $usuarioExistente = $usuarios->PesquisarPorEmail($Email);

        if ($usuarioExistente) {
            $token = bin2hex(random_bytes(32)); 
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $usuarios->InserirPasswordReset($usuarioExistente['cod'], $token, $expires);
            // ---- PHPMailer ----
                $mail = new PHPMailer(true); 

                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; 
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'saudex.suporte@gmail.com'; // SEU E-MAIL GMAIL
                    $mail->Password   = 'psxf knfx orua qwrr';    // SUA SENHA DE APP
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;
                    $mail->CharSet    = 'UTF-8';

                    // Remetente e Destinatário
                    $mail->setFrom('noreply@saudex.com', 'Saúdex'); // Remetente
                    $mail->addAddress($Email, $usuarioExistente['Nome']); // Destinatário

                    // Conteúdo do E-mail
                    $mail->isHTML(true);
                    $mail->Subject = 'Reset de Senha - Saúdex';
                    
                    // ATENÇÃO: TROCAR O LINK ABAIXO CASO MUDE DE PASTA
                    $urlReset = "http://localhost/saudex_tcc/saudex/reset-password.php?token=$token";
                
                    $mail->Body    = "Olá, " . htmlspecialchars($usuarioExistente['Nome']) . ".<br><br>" .
                                   "Recebemos uma solicitação para resetar sua senha. Clique no link abaixo para criar uma nova senha:<br>" .
                                   "<a href='$urlReset'>$urlReset</a><br><br>" .
                                   "Se você não solicitou isso, pode ignorar este e-mail.";
                    
                    $mail->AltBody = "Para resetar sua senha, copie e cole este link no seu navegador: $urlReset";
                    $mail->send();
                    
                } catch (Exception $e) {
                    error_log("Erro ao enviar e-mail: " . $mail->ErrorInfo);
                }
            }
            echo json_encode(['status' => 'sucesso', 'mensagem' => 'Se o e-mail existir, um link foi enviado.']);
        break;
    case 'ResetPassword':
            $token = filter_input(INPUT_POST, "token");
            $novaSenha = filter_input(INPUT_POST, "NovaSenha");

        if (!$token || !$novaSenha) {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Token ou senha não fornecidos']);
        break;
            }
            $resetData = $usuarios->ValidarTokenReset($token);

        if ($resetData) { 
                $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
                $usuarios->AtualizarSenha($resetData['user_id'], $novaSenhaHash);
                
                $usuarios->DeletarTokenReset($token);
                echo json_encode(['status' => 'sucesso', 'mensagem' => 'Senha resetada com sucesso.']);
        } else {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Token inválido ou expirado.']);
            }
        break; 
    default:
        echo json_encode(['status' => 'erro', 'mensagem' => 'Ação inválida']);   
}
}
?>