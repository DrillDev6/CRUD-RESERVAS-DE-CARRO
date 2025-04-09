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
        try {
            $host = 'localhost';
            $dbname = 'reservar_veiculos';
            $username = 'adriel';
            $password = 'Adriel@2025';

            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }
}

//
// Example usage of the Database class

// Usage example
// $db = new Database();
// $connection = $db->getConnection();

// public function prepare($sql)
// {
//     return $this->pdo->prepare($sql);
// }