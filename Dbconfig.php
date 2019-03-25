<?php
$db_host = "localhost";
$db_name = "GUVI_PROJECT";
$db_user = "guvi";
$db_pass = "skull.99";

try{
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>