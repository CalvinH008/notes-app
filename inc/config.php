<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'notes-app';

$conn = mysqli_connect($host, $user, $pass, $db_name);

if(!$conn){
    die('koneksi gagal :' . mysqli_connect_error());
}

?>