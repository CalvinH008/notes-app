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

function getAllNotes($user_id, $conn){
    $stmt = mysqli_prepare($conn, "SELECT * FROM notes WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getNoteById($id, $user_id, $conn){
    $stmt = mysqli_prepare($conn, "SELECT * FROM notes WHERE id = ? AND user_id = ?");
    mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function tambah($user_id, $title, $content, $conn){
    $stmt = mysqli_prepare($conn, "INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $title, $content);
    return mysqli_stmt_execute($stmt);
}

function edit($id, $user_id, $title, $content, $conn){
    $stmt = mysqli_prepare($conn, "UPDATE notes SET title = ?, content = ? WHERE id = ? AND user_id = ?");
    mysqli_stmt_bind_param($stmt, "ssii", $title, $content, $id, $user_id);
    return mysqli_stmt_execute($stmt);
}

function hapus($id, $user_id, $conn){
    $stmt = mysqli_prepare($conn, "DELETE FROM notes WHERE id = ? AND user_id = ?");
    mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
    return mysqli_stmt_execute($stmt);
}
?>