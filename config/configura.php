<?php
 #Caminhos absolutos
 $dirInt="";
 define('DIRPAGE',"http://{$_SERVER["HTTP_HOST"]}/{$dirInt}");
 $bar=(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/"; 
 define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");
 echo DIRPAGE.'<br>'.DIRREQ; 

#BANCO DE DADOS
const HOST = "localhost";
const DB = "reservar_veiculos";
const USER = "adriel";
const PASS = "Adriel@2025";

$conn = new mysqli(HOST, USER, PASS, DB);

//verfica a conexão
if($conn->connect_error){
    die("Conexão falhou: {$conn->connect_error}");
}

#incluir arquivos
set_include_path(get_include_path() . PATH_SEPARATOR . DIRREQ . 'lib/composer/vendor');

// require_once DIRREQ . 'lib/vendor/autoload.php'; // Autoload do Composer
// ?>
// <?php
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
$start = $_POST['start'] ?? null;
$end = $_POST['end'] ?? null;
$destino = $_POST['destino'] ?? null;
$km_inicial = $_POST['km_inicial'] ?? null;
$km_final = $_POST['km_final'] ?? null;
$avarias = $_POST['avarias'] ?? null;

if (!$start || !$end || !$destino || !$km_inicial) {
    http_response_code(400);
    echo "Dados incompletos para criar o evento.";
    exit;
}

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
?>








