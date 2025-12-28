<nav class="navbar">
    <div class="navbar-brand">
        <h2>📝 Notes App</h2>
    </div>
    <div class="navbar-menu">
        <span>Welcome, <strong><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></strong></span>
        <a href="../auth/logout.php" class="btn-logout">Logout</a>
    </div>
</nav>