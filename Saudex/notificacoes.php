<?php
session_start();
require_once 'conexao.php';

try {
    $conexao = new Conexao();
    $pdo = $conexao->getConnection();
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Erro de Conexão com o Banco de Dados.']);
    exit;
}

if (!isset($_SESSION['usuario']['cod'])) {
    echo json_encode(['error' => 'Usuário não autenticado']);
    exit;
}

$codUsuario = $_SESSION['usuario']['cod'];

// Se o parâmetro "acao" for "marcarLidas" e "id" for enviado
if (isset($_GET['acao']) && $_GET['acao'] === 'marcarLidas' && isset($_GET['id'])) {
    $sql = "UPDATE notificacoes SET lida = 1 WHERE codNotificacao = ? AND codUsuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id'], $codUsuario]);
    echo json_encode(['status' => 'ok']);
    exit;
}

// Caso contrário, apenas retorna as notificações
$sql = "SELECT codNotificacao, mensagem, lida, criadoEm 
        FROM notificacoes 
        WHERE codUsuario = ? 
        ORDER BY criadoEm DESC 
        LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute([$codUsuario]);
$notificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT COUNT(*) FROM notificacoes WHERE codUsuario = ? AND lida = 0";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([$codUsuario]);
$naoLidas = $stmt2->fetchColumn();

echo json_encode([
    'naoLidas' => $naoLidas,
    'notificacoes' => $notificacoes
]);
?>