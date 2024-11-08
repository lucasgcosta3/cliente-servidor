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
            $success = "Senha redefinida com sucesso! Clique aqui para fazer login.";
        } else {
            $error = "Token inválido ou expirado.";
        }
    } else {
        $error = "As senhas não correspondem.";
    }
}

// Armazena mensagens de sucesso ou erro em variáveis de sessão
session_start();
$_SESSION['success'] = $success;
$_SESSION['error'] = $error;
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
</head>
<body>
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

  <!-- Campos ocultos para passar mensagens -->
  <input type="hidden" id="success-message" value="<?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ''; ?>">
  <input type="hidden" id="error-message" value="<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>">

  <?php
    // Limpar as mensagens após capturá-las
    unset($_SESSION['success']);
    unset($_SESSION['error']);
  ?>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/sweetAlert.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
