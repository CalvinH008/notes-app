<?php
require_once '../inc/auth_check.php';
require_once '../inc/config.php';
require_once '../inc/function.php';

$error = "";

$id = $_GET["id"];
$user_id = $_SESSION["id"];

$note = hapus($id, $user_id, $conn);

if(!$result){
    header('location: index.php');
    exit();
}else{
    $error = "Gagal dihapus. Silakan coba lagi";
    header('location: index.php');
    exit();
}

?>