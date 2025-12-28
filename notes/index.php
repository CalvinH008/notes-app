<?php
require_once '../inc/auth_check.php';
require_once '../inc/config.php';
require_once '../inc/function.php';

$user_id = $_SESSION['id'];
$notes = getAllNotes($user_id, $conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
</head>
<body>
    <?php include '../inc/navbar.php'; ?>
    
    <div class="main-container">
        <?php include '../inc/sidebar-footer.php'; ?>
        
        <main class="content">
            <div class="content-header">
                <h1>My Notes</h1>
                <a href="tambah.php" class="btn btn-primary">+ Add New Note</a>
            </div>

            <div class="notes-grid">
                <?php if (empty($notes)): ?>
                    <div class="empty-state">
                        <p>📝 Belum ada catatan.</p>
                        <a href="tambah.php" class="btn btn-primary">Buat catatan pertama</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($notes as $note): ?>
                        <div class="note-card">
                            <h3><?= htmlspecialchars($note['title']) ?></h3>
                            <p class="note-preview"><?= substr(htmlspecialchars($note['content']), 0, 100) ?>...</p>
                            <small class="note-date">📅 <?= date('d M Y, H:i', strtotime($note['created_at'])) ?></small>
                            <div class="note-actions">
                                <a href="edit.php?id=<?= $note['id'] ?>" class="btn-edit">✏️ Edit</a>
                                <a href="hapus.php?id=<?= $note['id'] ?>" class="btn-delete" onclick="return confirm('Yakin hapus catatan ini?')">🗑️ Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>