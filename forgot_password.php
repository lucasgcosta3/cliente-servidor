<?php
require_once 'User.php';

$alertScript = '';

if (isset($_POST['reset'])) {
    $user = new User();
    $token = $user->createToken($_POST['email']);
    $linkRecuperacao = "reset_password.php?token=$token";
    
    // Aqui você enviaria o link com o token por email, mas vamos simular
    // echo "<script>
    //         alert('Token: $token\\nClique no OK para prosseguir com o reset');
    //         window.location.href = '$linkRecuperacao';
    //       </script>";
    // exit;

  
    $alertScript = "<script>
        Swal.fire({
            position: 'top',
            title: 'Recuperação de Senha',
            text: 'Seu token de recuperação é: $token. Clique em OK para continuar.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = '$linkRecuperacao';
        });
    </script>";

    
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
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
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
  <script src="script.js"></script>

  <?php
  if (!empty($alertScript)) {
      echo $alertScript;
  }
  ?>
</body>
</html>
