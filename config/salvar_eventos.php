<?php
session_start();
require_once '../config/database.php';
$db = new Database();
$pdo = $db->getConnection();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo "Usuário não autenticado.";
    exit;
}

$user_id = $_SESSION['user_id'];
$start = $_POST['hora_inicio'];
$end = $_POST['hora_chegada'];
$start = date('Y-m-d H:i:s', strtotime($start));    
$destino = $_POST['destino'];
$km_inicial = $_POST['km_inicial'];
$km_final = $_POST['km_final'] ?: null;
$avarias = $_POST['avarias'] ?: null;

$stmt = $pdo->prepare("SELECT COUNT(*) FROM eventos WHERE (start < :end AND end > :start)");
$stmt->execute([':start' => $start, ':end' => $end]);
if ($stmt->fetchColumn() > 0) {
    echo "Já existe um agendamento nesse horário.";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO eventos (user_id, title, start, end, destino, km_inicial, km_final, avarias) VALUES (:user_id, :title, :start, :end, :destino, :km_inicial, :km_final, :avarias)");
$stmt->execute([
    ':user_id' => $user_id,
    ':title' => $destino,
    ':start' => $start,
    ':end' => $end,
    ':destino' => $destino,
    ':km_inicial' => $km_inicial,
    ':km_final' => $km_final,
    ':avarias' => $avarias
]);

echo "Evento criado com sucesso!";
