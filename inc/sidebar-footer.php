<?php

require_once 'function.php';
?>
<aside class="sidebar">
    <div class="sidebar-header">
        <h3>Menu</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
            📋 All Notes
        </a></li>
        <li><a href="tambah.php" class="<?= basename($_SERVER['PHP_SELF']) == 'tambah.php' ? 'active' : '' ?>">
            ➕ Add Note
        </a></li>
        <li><a href="#" class="disabled">
            ⭐ Favorites (Coming Soon)
        </a></li>
        <li><a href="#" class="disabled">
            🗂️ Categories (Coming Soon)
        </a></li>
    </ul>
    
    <div class="sidebar-footer">
        
    </div>
</aside>