<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'reservar_veiculos';
    private $username = 'adriel';
    private $password = 'Adriel@2025';
    private $charset = 'utf8mb4';
    private $pdo;
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            // Log the error instead of displaying it
            error_log('Database connection error: ' . $e->getMessage());
            die('Database connection failed.');
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}

// Usage example
// $db = new Database();
// $connection = $db->getConnection();

// public function prepare($sql)
// {
//     return $this->pdo->prepare($sql);
// }