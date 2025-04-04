<?php
// Start session
session_start();

// Include database connection
require_once '../config/database.php';
$db = new Database();
$pdo = $db->getConnection();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email) || empty($senha)) {
        // Check if fields are empty
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    try {
        // Prepare SQL query to fetch user
        $stmt = $pdo->prepare('SELECT id, email, senha FROM usuarios WHERE email = :email LIMIT 1');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify user and password
        //password_verify($password, $user['senha'])
        if ($user && $senha == $user['senha']) {
            // Store user ID in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Redirect to dashboard or home page
            header('Location: ./dash.php');
            exit;
        } else {
            echo "Usuário ou senha inválidos.";
        }
    } catch (PDOException $e) {
        echo "Erro no servidor. Tente novamente mais tarde.";
    }
}
?>
<?php 

include_once '../view/paginaLogin.html'; // Configurações do sistema

?>