<?php
require_once 'functions.php';

if (isset($_POST['register'])) {
  register_user($_POST['nome'], $_POST['email'], $_POST['password']);
}
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['success'], $_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/sweetAlert.js"></script>
</head>
<body>
  <?php exibir_alerta() ?>
  <div class="main-login">
    <div class="left-login">
      <h1>Cadastre-se<br>E entre para o nosso time</h1>
      <img src="assets/images/programming-animate.svg" class="left-login-image" alt="programador">
    </div>
    <form action="" method="post">
      <div class="right-login">
        <div class="card-login">
          <h1>CADASTRO</h1>
          <div class="textfield">
            <label for="nome">Nome</label>
            <div class="input-wrapper">
              <input type="text" name="nome" id="nome" placeholder="Nome" required>
              <i class="fa-regular fa-user"></i>
            </div>
          </div>
          <div class="textfield">
            <label for="email">E-mail</label>
            <div class="input-wrapper">
              <input type="email" name="email" id="email" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
              title="Digite um e-mail válido, como exemplo@dominio.com">
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
        </div>
        <button class="btn-login" type="submit" name="register">Cadastrar</button>
        <h5 class="cadastro">Já possui uma conta? <a href="login.php">Faça login</a></h5>
      </div>
      </div>
    </form>
  </div>
  <script>
    const successMessage = "<?php echo $successMessage; ?>";
    const errorMessage = "<?php echo $errorMessage; ?>";
  </script>
</body>
</html>