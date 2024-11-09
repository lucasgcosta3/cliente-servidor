<?php
session_start();
require_once 'User.php';

$max_tentativas = 5;
$tempo_bloqueio = 900;

if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
    $_SESSION['ultimo_login_erro'] = 0;
}

if ($_SESSION['tentativas'] >= $max_tentativas && (time() - $_SESSION['ultimo_login_erro']) < $tempo_bloqueio) {
    $tempo_restante = $tempo_bloqueio - (time() - $_SESSION['ultimo_login_erro']);
    $_SESSION['error'] = "Muitas tentativas de login falharam. Tente novamente em " . gmdate("i:s", $tempo_restante) . " minutos.";
} else {
    if (isset($_POST['login'])) {
        $user = new User();
        if ($user->login($_POST['email'], $_POST['password'])) {
            $_SESSION['success'] = "Login bem sucedido!";
            $_SESSION['tentativas'] = 0;
        } else {
            $_SESSION['tentativas']++;
            $_SESSION['ultimo_login_erro'] = time();
            $_SESSION['error'] = "Credenciais inválidas. Você tem " . ($max_tentativas - $_SESSION['tentativas']) . " tentativas restantes.";

            if ($_SESSION['tentativas'] >= $max_tentativas) {
                $_SESSION['error'] = "Muitas tentativas falharam. Tente novamente mais tarde.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/sweetAlert.js" defer></script>
</head>
<body>
  <div class="main-login">
    <div class="left-login">
      <h1>Que bom te ver por aqui!<br>Faça o login e aproveite</h1>
      <img src="assets/images/programming-animate.svg" class="left-login-image" alt="programador">
    </div>
    <form action="" method="post">
      <div class="right-login">
        <div class="card-login">
          <h1>LOGIN</h1>
          <div class="textfield">
            <label for="email">E-mail</label>
            <div class="input-wrapper">
              <input type="email" name="email" id="email" placeholder="E-mail" required>
              <i class="fa-regular fa-envelope"></i>
            </div>
          </div>
          <div class="textfield">
            <label for="senha">Senha</label>
            <div class="input-wrapper">
              <input type="password" name="password" id="senha" placeholder="Senha" required
                     pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d\W]{8,}"
                     title="A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula e um número ">
              <i style="cursor: pointer;" class="fa-regular fa-eye toggle-password" onclick="verSenha('senha')"></i>
            </div>
            <p><a href="forgot.php">Esqueceu a senha?</a></p>
          </div>
          <button class="btn-login" name="login" type="submit" style="margin: 0 0 25px">Login</button>
          <h5 class="cadastro">Ainda não possui uma conta?<a href="register.php"> Cadastre-se</a></h5>
        </div>
      </div>
    </form>

    <!-- Campos ocultos para passar mensagens -->
    <input type="hidden" id="success-message" value="<?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ''; ?>">
    <input type="hidden" id="error-message" value="<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>">

    <?php 
      unset($_SESSION['success']);
      unset($_SESSION['error']);
    ?>
  </div>
</body>
</html>
