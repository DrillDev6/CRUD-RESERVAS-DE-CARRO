<?php
require_once '../config/database.php';
$db = new Database();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT id, title, start, end FROM eventos");
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($eventos);
?>