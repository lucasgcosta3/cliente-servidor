<?php
require_once 'Database.php';

class User {
    private $conn;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function createToken($email) {
        $token = bin2hex(random_bytes(16));
        $token_expiration = date("Y-m-d H:i:s", strtotime("+3 minutes"));
    
        $query = "UPDATE users SET token = :token, token_expiration = :expiration WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":expiration", $token_expiration);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    
        // Debug: verifique se o token e a expiração foram salvos
        echo "Token: $token, Expiração: $token_expiration";
    
        return $token;
    }
    
    public function resetPassword($token, $new_password) {
        $query = "SELECT * FROM users WHERE token = :token AND token_expiration > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Debug: verifique se o usuário foi encontrado
        if (!$user) {
            echo "Token inválido ou expirado.";
            return false;
        }
    
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update_query = "UPDATE users SET password = :password, token = NULL, token_expiration = NULL WHERE id = :id";
        $update_stmt = $this->conn->prepare($update_query);
        $update_stmt->bindParam(":password", $hashed_password);
        $update_stmt->bindParam(":id", $user['id']);
        $update_stmt->execute();
    
        return true;
    }
    
    public function register($nome, $email, $password) {
        // Verifica se o email já está em uso
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['error_message'] = 'Este email já está cadastrado. Por favor, tente outro.';
            return;
        }  
        // Cria o hash da senha e insere o novo usuário
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (nome, email, password) VALUES (:nome, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashed_password);
    
        if ($stmt->execute()) {
            $_SESSION['success_message'] = 'Cadastro bem-sucedido! Agora você pode fazer login.';
        } else {
            $_SESSION['error_message'] = 'Ocorreu um erro no cadastro. Tente novamente.';
        }
    } 
}
?>
