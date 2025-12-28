<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>About — Notes App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #ffffff;
            color: #222;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            border-bottom: 1px solid #eee;
        }

        .navbar h1 {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .nav-links a.btn {
            padding: 8px 14px;
            background: #2ecc71;
            color: #fff;
            border-radius: 6px;
        }

        /* ===== HERO ===== */
        .hero {
            padding: 80px 60px;
            max-width: 900px;
            margin: auto;
        }

        .hero-text h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 16px;
            line-height: 1.7;
            color: #555;
            margin-bottom: 18px;
        }

        /* ===== SECTION ===== */
        .section {
            background: #f9f9f9;
            padding: 80px 60px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .container h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 16px;
            color: #555;
            line-height: 1.7;
            margin-bottom: 16px;
        }

        /* ===== FOOTER ===== */
        footer {
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #777;
            border-top: 1px solid #eee;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar {
                padding: 20px;
            }

            .hero,
            .section {
                padding: 60px 20px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h1>📝 NotesApp</h1>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="auth/login.php" class="btn">Login</a>
        </div>
    </div>

    <!-- HERO / ABOUT -->
    <section class="hero">
        <div class="hero-text">
            <h2>Tentang NotesApp</h2>
            <p>
                NotesApp adalah aplikasi pencatatan sederhana yang dirancang
                untuk membantu pengguna menyimpan ide, tugas, dan catatan
                penting secara aman dan terorganisir.
            </p>
            <p>
                Aplikasi ini dibangun menggunakan PHP Native dan MySQL,
                dengan fokus pada performa, keamanan data, dan kemudahan
                penggunaan tanpa fitur yang berlebihan.
            </p>
            <p>
                Setiap pengguna memiliki catatan pribadi yang hanya dapat
                diakses setelah login, sehingga privasi tetap terjaga.
            </p>
        </div>
    </section>

    <!-- INFO SECTION -->
    <div class="section">
        <div class="container">
            <h2>Apa yang Bisa Kamu Lakukan?</h2>
            <p>
                Dengan NotesApp, kamu dapat membuat, mengedit, dan menghapus
                catatan kapan saja sesuai kebutuhanmu.
            </p>
            <p>
                Project ini juga dibuat sebagai latihan backend untuk memahami
                autentikasi user, relasi database, dan alur kerja aplikasi web
                yang rapi dan aman.
            </p>
            <p>
                NotesApp cocok digunakan sebagai aplikasi pribadi maupun
                sebagai project portfolio untuk pengembang pemula.
            </p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        © 2025 Notes App — PHP Native Project
    </footer>

</body>
</html>
