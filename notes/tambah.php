<?php
require_once '../inc/auth_check.php';
require_once '../inc/function.php';
require_once '../inc/config.php';

$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION['id'];  // ✅ Ambil dari SESSION
    
    // Validasi
    if(empty($title)){
        $error = "Judul tidak boleh kosong!"; 
    }elseif(empty($content)){
        $error = "Content tidak boleh kosong!";
    }else{
        // Simpan ke database
        $result = tambah($user_id, $title, $content, $conn);
        
        // Cek hasil
        if($result){
            header('Location: index.php');
            exit;  // ✅ Jangan lupa exit setelah redirect!
        }else{
            $error = "Gagal menyimpan note. Silakan coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Note</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
</head>
<body>
    <!-- NAVBAR -->
    <?php include '../inc/navbar.php'; ?>
    
    <div class="main-container">
        <!-- SIDEBAR -->
        <?php include '../inc/sidebar-footer.php'; ?>
        
        <!-- CONTENT AREA -->
        <main class="content">
            <div class="content-header">
                <h1>Tambah Note Baru</h1>
            </div>

            <!-- FORM TAMBAH NOTE -->
            <div style="max-width: 800px;">
                <form method="POST" action="">
                    
                    <!-- Tampilkan Error kalau ada -->
                    <?php if (!empty($error)): ?>
                        <div style="background: #fee2e2; border: 1px solid #fca5a5; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; color: #dc2626;">
                            ⚠️ <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <!-- Input Title -->
                    <div class="form-group">
                        <label>Title *</label>
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control" 
                            placeholder="Masukkan judul note..."
                            value="<?= isset($title) ? htmlspecialchars($title) : '' ?>"
                        >
                    </div>

                    <!-- Textarea Content -->
                    <div class="form-group">
                        <label>Content *</label>
                        <textarea 
                            name="content" 
                            class="form-control" 
                            placeholder="Tulis isi note di sini..."
                        ><?= isset($content) ? htmlspecialchars($content) : '' ?></textarea>
                    </div>

                    <!-- Buttons -->
                    <div style="display: flex; gap: 1rem;">
                        <button type="submit" class="btn btn-primary">💾 Save Note</button>
                        <a href="index.php" class="btn" style="background: #95a5a6; color: white; text-decoration: none;">❌ Cancel</a>
                    </div>
                </form>
            </div>

        </main>
    </div>
</body>
</html>

