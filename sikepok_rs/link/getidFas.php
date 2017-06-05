<?php 
session_start();
$data = json_decode(file_get_contents("php://input")); 
$_SESSION["id_fas"] = $data->id_fas;
echo true;
?>