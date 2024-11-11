<?php
class Database {
    private $host = "localhost:3307";
    private $db_name = "sistema_de_login";
    private $username = "root";
    private $password = "4521";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Erro na conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
