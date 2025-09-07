<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: formLogin.php");
    exit;
}
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($usuario['Nome']); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($usuario['Email']); ?></p>
    <a href="logout.php">Sair</a>
</body>
</html>