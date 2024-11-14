<?php
session_start();
require_once 'functions.php';

if (isset($_POST['reset'])) {
    forgot_password_request($_POST['email']);
}

$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
$redirectUrl = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : '';
unset($_SESSION['success_message'], $_SESSION['error_message'], $_SESSION['redirect_url']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperação de senha</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/forgotAlert.js"></script>
</head>
<body>
  <?php exibir_alerta() ?>
  <form action="" method="post">
    <div class="main-login">
      <div class="right-login">
        <div class="card-login">
          <h1 style="text-align: center;">Recuperação de senha</h1>
          <div class="textfield">
            <label for="email">E-mail</label>
            <div class="input-wrapper">
              <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
              <i class="fa-regular fa-envelope"></i>
            </div>
          </div>
          <button class="btn-login" style="margin: 25px" type="submit" name="reset">Continuar</button>
        </div>
      </div>
    </div>
  </form>

  <script>
    const successMessage = "<?php echo $successMessage; ?>";
    const errorMessage = "<?php echo $errorMessage; ?>";
    const redirectUrl = "<?php echo $redirectUrl; ?>";
  </script>
</body>
</html>
