<?php
$dns= "mysql:host=localhost;dbname=agendaie;charset=utf8";//Define onde esta o banco
$user= "root";//para logar no banco
$pass= "";//para logar no banco

try{
    $conexao = new PDO($dns,$user,$pass);
}catch (PDOException $erro) {
    echo "erro na conexão com o banco";
}
