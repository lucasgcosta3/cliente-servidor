<?php
require_once 'User.php';

$user = new User();
$token = $_GET['token'] ?? null;
$error = '';
$success = '';

// Verifica se o formulário de redefinição foi enviado
if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        if ($user->resetPassword($token, $new_password)) {
            $success = "Senha redefinida com sucesso! <a href='index.php'>Clique aqui para fazer login</a>";
        } else {
            $error = "Token inválido ou expirado.";
        }
    } else {
        $error = "As senhas não correspondem.";
    }
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
  <script src="assets/js/script.js"></script>
  <script src="assets/js/sweetAlert.js"></script>
</head>
<body>
  <div class="main-login">
    <form action="" method="post">
      <div class="right-login">
        <div class="card-login">
          <h1 style="text-align: center;">Redefinir Senha</h1>
          <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php else: ?>
          <div class="textfield">
            <label for="new_password">Nova senha</label>
            <div class="input-wrapper">
              <input type="password" name="new_password" id="new_password" placeholder="Digite a nova senha" required>
            </div>
          </div>
          <div class="textfield">
              <label for="confirm_password">Confirme a senha</label>
              <div class="input-wrapper">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Digite a senha novamente" required>   
                <i style="cursor: pointer;" class="fa-regular fa-eye toggle-password" onclick="verSenha()"></i>
              </div>
            </div>
        <button class="btn-login" style="margin: 25px" type="submit" name="reset_password">Salvar</button>
      </div>
    </form>
    <?php endif; ?>
  </div>
</body>
</html>