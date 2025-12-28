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
    <style>
        /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #ffffff;
    color: #333;
}

/* NAVBAR */
.navbar {
    background: #ffffff;
    color: #333;
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e5e5e5;
    position: sticky;
    top: 0;
    z-index: 100;
}

.navbar-brand h2 {
    font-size: 1.5rem;
    color: #333;
    font-weight: 500;
}

.navbar-menu {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.btn-logout {
    background: #333;
    color: white;
    padding: 0.5rem 1.2rem;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 0.9rem;
}

.btn-logout:hover {
    background: #000;
}

/* MAIN CONTAINER */
.main-container {
    display: flex;
    min-height: calc(100vh - 60px);
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background: #ffffff;
    padding: 1.5rem;
    border-right: 1px solid #e5e5e5;
    display: flex;
    flex-direction: column;
}

.sidebar-header h3 {
    margin-bottom: 1.5rem;
    color: #333;
    font-size: 1.1rem;
    font-weight: 500;
}

.sidebar-menu {
    list-style: none;
    flex-grow: 1;
}

.sidebar-menu li {
    margin-bottom: 0.5rem;
}

.sidebar-menu a {
    display: block;
    padding: 0.8rem 1rem;
    color: #666;
    text-decoration: none;
    border-radius: 6px;
    transition: 0.3s;
    font-size: 0.95rem;
}

.sidebar-menu a:hover {
    background: #f5f5f5;
    color: #333;
}

.sidebar-menu a.active {
    background: #333;
    color: white;
}

.sidebar-menu a.disabled {
    color: #ccc;
    cursor: not-allowed;
}

.sidebar-footer {
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid #f0f0f0;
    font-size: 0.9rem;
    color: #999;
}

/* CONTENT AREA */
.content {
    flex: 1;
    padding: 2rem;
    background: #ffffff;
}

.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.content-header h1 {
    color: #333;
    font-size: 2rem;
    font-weight: 500;
}

/* BUTTONS */
.btn {
    padding: 0.7rem 1.5rem;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
    cursor: pointer;
    border: none;
    font-size: 0.95rem;
}

.btn-primary {
    background: #333;
    color: white;
}

.btn-primary:hover {
    background: #000;
}

/* NOTES GRID */
.notes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.note-card {
    background: #ffffff;
    padding: 1.5rem;
    border-radius: 8px;
    border: 1px solid #e5e5e5;
    transition: transform 0.3s, box-shadow 0.3s;
}

.note-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.note-card h3 {
    color: #333;
    margin-bottom: 0.8rem;
    font-size: 1.2rem;
    font-weight: 500;
}

.note-preview {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.note-date {
    display: block;
    color: #999;
    font-size: 0.85rem;
    margin-bottom: 1rem;
}

.note-actions {
    display: flex;
    gap: 0.8rem;
}

.btn-edit, .btn-delete {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: 0.3s;
}

.btn-edit {
    background: #f5f5f5;
    color: #333;
    border: 1px solid #e5e5e5;
}

.btn-edit:hover {
    background: #e5e5e5;
}

.btn-delete {
    background: #333;
    color: white;
}

.btn-delete:hover {
    background: #000;
}

/* EMPTY STATE */
.empty-state {
    text-align: center;
    padding: 3rem;
    background: #ffffff;
    border-radius: 8px;
    border: 1px solid #e5e5e5;
    grid-column: 1 / -1;
}

.empty-state p {
    font-size: 1.1rem;
    color: #999;
    margin-bottom: 1rem;
}

/* FORM STYLES */
.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #e5e5e5;
    border-radius: 6px;
    font-size: 0.95rem;
    transition: 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: #333;
}

textarea.form-control {
    min-height: 200px;
    resize: vertical;
    font-family: inherit;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .main-container {
        flex-direction: column;
    }
    
    .sidebar {
        width: 100%;
    }
    
    .notes-grid {
        grid-template-columns: 1fr;
    }
    
    .content-header {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
}
    </style>
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