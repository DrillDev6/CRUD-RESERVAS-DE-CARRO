<?php
namespace Models;
class ModelConect
{
    public function conectDB()
{
    try{
    $con=new \PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        return $con;
        }catch(\PDOException $erro ){
return $erro->getMessage();
}
}
}



?>