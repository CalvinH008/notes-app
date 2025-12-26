<?php
require_once 'config.php';

function registrasi($conn, $data){
    // bersihkan dan validasi input
    $username = strtolower(stripslashes($data["username"]));
    $password = trim($data["password"]);
    
    // pastikan username dan password tidak kosong
    if(empty($username) || empty($password)){
        echo "<script>
            alert('username dan password wajib diisi');    
        </script>";
        return false;
    }
    // cek username apakah sudah ada
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah ada');
            </script>";
        return false;    
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // tambahkan user baru ke dalam database
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    // cek apakah berhasil ditambahkan
    if(mysqli_affected_rows($conn) > 0){
        return 1; //sukses, return nilai positif
    }else{
        echo "<script>
                alert('Registrasi gagal, Silakan coba lagi');
            </script>";
        return false;
    }
}

function login($conn, $data){
    // bersihkan dan validasi input
    $username = strtolower(stripslashes($data["username"]));
    $password = trim($data["password"]);
    // verifikasi password dan username
    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'" );
    // cek username
    if(mysqli_num_rows($result)){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            return $row;
        }
    }
    return false;
}

?>