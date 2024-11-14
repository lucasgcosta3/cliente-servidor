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
        // Se já existe uma mensagem de erro específica, mantenha ela; caso contrário, defina uma genérica
        $_SESSION['error_message'] = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "Credenciais inválidas.";
        return false;
    }
}

function exibir_alerta() {
    if (isset($_SESSION['success'])) {
        echo "<script>Swal.fire('Sucesso', '{$_SESSION['success']}', 'success');</script>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<script>Swal.fire('Erro', '{$_SESSION['error']}', 'error');</script>";
        unset($_SESSION['error']);
    }
}
?>
