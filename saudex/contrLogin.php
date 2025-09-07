<?php
session_start();
include 'clssaudex.php';
$usuarios = new clssaudex();

if (isset($_POST['Email']) && isset($_POST['Senha'])) {
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];

    $resultado = json_decode($usuarios->Login($Email, $Senha), true);

    if ($resultado['status'] === 'sucesso') {
        $_SESSION['usuario'] = $resultado['usuario']; // Salva dados do usuário na sessão

        echo '<div style="text-align:center; margin-top:50px;">
                <h2 style="color:green;">' . $resultado['msg'] . '</h2>
                <p>Redirecionando para o menu...</p>
              </div>
              <script>
                setTimeout(function() {
                  window.location.href = "Menu.php";
                }, 2000);
              </script>';
        exit;
    } else {
        echo $resultado['msg'];
    }
} else {
    echo "Preencha o e-mail e a senha.";
}
