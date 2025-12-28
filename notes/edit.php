<?php
require_once '../inc/auth_check.php';
require_once '../inc/function.php';
require_once '../inc/config.php';

$error = "";

$id = $_GET['id'];
$user_id = $_SESSION['id'];

$note = getNoteById($id, $user_id, $conn);

if(!$note){
    header('location: index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION["id"];

    if(empty($title)){
        $error = "Judul tidak boleh kosong!"; 
    }elseif(empty($content)){
        $error = "Content tidak boleh kosong!";
    }else{
        $result = edit($id, $user_id, $title, $content, $conn);

        if($result){
            header('location: index.php');
        }else{
            $error = "Gagal mengubah note. Silakan coba lagi";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
</head>
<body>
    <?php include '../inc/navbar.php'; ?>
    
    <div class="main-container">
        <?php include '../inc/sidebar-footer.php'; ?>
        
        <main class="content">
            <div class="content-header">
                <h1>Edit Note</h1>
            </div>

            <div style="max-width: 800px;">
                <form method="POST">
                    
                    <!-- Error Message -->
                    <?php if (!empty($error)): ?>
                        <div style="background: #fee2e2; border: 1px solid #fca5a5; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; color: #dc2626;">
                            ⚠️ <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <!-- Input Title (sudah diisi dengan data dari database) -->
                    <div class="form-group">
                        <label>Title *</label>
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control" 
                            value="<?= htmlspecialchars($note['title']) ?>"
                        >
                    </div>

                    <!-- Textarea Content (sudah diisi dengan data dari database) -->
                    <div class="form-group">
                        <label>Content *</label>
                        <textarea 
                            name="content" 
                            class="form-control"
                        ><?= htmlspecialchars($note['content']) ?></textarea>
                    </div>

                    <!-- Buttons -->
                    <div style="display: flex; gap: 1rem;">
                        <button type="submit" class="btn btn-primary">💾 Update Note</button>
                        <a href="index.php" class="btn" style="background: #95a5a6; color: white; text-decoration: none;">❌ Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>