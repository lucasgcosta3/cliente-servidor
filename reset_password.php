<?php
session_start();
require_once 'functions.php';

$token = $_GET['token'] ?? null;

if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    reset_user_password($token, $new_password, $confirm_password);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>
<?php exibir_alerta(); ?>
  <div class="main-login">
    <form action="" method="post">
      <div class="right-login">
      <div class="card-login">
          <h1 style="text-align: center;">Redefinir Senha</h1>
          <div class="textfield">
              <label for="new_password">Nova senha</label>
              <div class="input-wrapper">
                  <input type="password" name="new_password" id="new_password" placeholder="Digite a nova senha" required
                          pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d\W]{8,}"
                          title="A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula e um número">
                  <i style="cursor: pointer;" class="fa-regular fa-eye toggle-password" onclick="verSenha('new_password')"></i>
              </div>
          </div>
          <div class="textfield">
              <label for="confirm_password">Confirme a senha</label>
              <div class="input-wrapper">
                  <input type="password" name="confirm_password" id="confirm_password" placeholder="Digite a senha novamente" required>   
                  <i style="cursor: pointer;" class="fa-regular fa-eye toggle-password" onclick="verSenha('confirm_password')"></i>
              </div>
          </div>
          <button class="btn-login" style="margin: 25px" type="submit" name="reset_password">Salvar</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
