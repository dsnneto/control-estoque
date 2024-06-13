<?php 

require_once "./conexao/conexao.php";

try {
    $comandoSQL =  $conexao->prepare("
    SELECT  FROM 
    ");
} catch (\Throwable $th) {
    //throw $th;
}