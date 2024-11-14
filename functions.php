<?php
require_once 'User.php';

function login_user($email, $password) {
    $user = new User();
    if ($user->login($email, $password)) {
        $_SESSION['success'] = "Seja bem-vindo, " . $_SESSION['user_name'] . "!";
        return true;
    } else {
        $_SESSION['error'] = "Credenciais inválidas.";
        return false;
    }
}

function register_user($nome, $email, $password) {
    $user = new User();
    $response = $user->register($nome, $email, $password);
    
    if ($response === true) {
        $_SESSION['success_message'] = "Cadastro bem sucedido!";
        return true;
    } else {
        // Se já existe uma mensagem de erro específica, mantenha ela; caso contrário, exibe a msg genérica
        $_SESSION['error_message'] = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "Credenciais inválidas.";
        return false;
    }
}

function forgot_password_request($email) {
    $user = new User();
    $token = $user->createToken($email);
    
    if ($token) {
        $linkRecuperacao = "reset_password.php?token=$token";
        $_SESSION['success_message'] = "Seu token de recuperação é: $token. Clique em OK para continuar.";
        $_SESSION['redirect_url'] = $linkRecuperacao;
        return true;
    } else {
        $_SESSION['error_message'] = "E-mail não encontrado no sistema.";
        return false;
    }
}

function reset_user_password($token, $new_password, $confirm_password) {
    $user = new User();

    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "As senhas não correspondem.";
        return false;
    }

    if ($user->resetPassword($token, $new_password)) {
        $_SESSION['success_message'] = "Senha redefinida com sucesso!";
        return true;
    } else {
        $_SESSION['error_message'] = "Token inválido ou expirado.";
        return false;
    }
}


function exibir_alerta() {
    if (isset($_SESSION['success_message'])) {
        echo "<script>Swal.fire('Sucesso', '{$_SESSION['success_message']}', 'success').then(() => { window.location.href = 'login.php';});
            </script>";
        unset($_SESSION['success_message']);
    }

    if (isset($_SESSION['error_message'])) {
        echo "<script>Swal.fire('Erro', '{$_SESSION['error_message']}', 'error');</script>";
        unset($_SESSION['error_message']);
    }
}
?>
