<?php
// salvar_usuario.php
require_once '../config/database.php';

header('Content-Type: application/json');

// Recebe os dados do Firebase (via fetch no frontend)
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['firebase_uid']) || !isset($data['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Dados inválidos.']);
    exit;
}

$firebase_uid = $data['firebase_uid'];
$email = $data['email'];

try {
    $db = new Database();
    $pdo = $db->getConnection();

    // Verifica se o usuário já existe
    $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $check->bindParam(':email', $email);
    $check->execute();

    if ($check->rowCount() === 0) {
        // Insere novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios (firebase_uid, email) VALUES (:uid, :email)");
        $stmt->bindParam(':uid', $firebase_uid);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    echo json_encode(['status' => 'success', 'message' => 'Usuário salvo no banco.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar no banco: ' . $e->getMessage()]);
}
?>
