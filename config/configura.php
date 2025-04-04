<?php
 #Caminhos absolutos
 $dirInt="";
 define('DIRPAGE',"http://{$_SERVER["HTTP_HOST"]}/{$dirInt}");
 $bar=(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/"; 
 define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");
 echo DIRPAGE.'<br>'.DIRREQ; 

#BANCO DE DADOS
define('HOST',"localhost");
define('DB',"reservar_veiculos");
define('USER',"adriel");
define('PASS',"Adriel@2025");

$conn = new mysqli(HOST, USER, PASS, DB,);

//verfica a conexão
if($conn->connect_error){
    die("Conexão falhou: ".$conn->connect_error);
}

//Recebe os dados do formaulário

// $data = json_decode($json, true);

// if (isset($data["usuario_id"]) && isset ($data["token"])) {
//     $usuario_id = $conn->real_escape_string($data["usuario_id"]);
//     $token = $conn->real_escape_string($data["token"]);
    

//     //inserir os dados no mysql
// $sql = "INSERT INTO reservas_carros (usuario_id, token) VALUES ('$usuario_id', '$token')";
//     if ($conn->query($sql) === TRUE) {
//         echo json_encode(["status" => "success", "success" => true, "message" => "Dados inseridos com sucesso."]);
//     } else {
//         echo json_encode(["status" => "error", "message" => "Erro ao inserir dados: " . $conn->error]);
//     }

//     //fechar a conexão
//     $conn->close();
// } else {
//     echo json_encode(array("status" => "error", "message" => "Dados inválidos."));
//     exit;
// }


#incluir arquivos
set_include_path(get_include_path() . PATH_SEPARATOR . DIRREQ . 'lib/composer/vendor/autoloading.php');

require_once DIRREQ . 'lib/vendor/autoload.php'; // Autoload do Composer
?>


?>






