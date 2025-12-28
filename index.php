<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notes App</title>
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 80px 60px;
        }

        .hero-text {
            width: 50%;
        }

        .hero-text h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        .hero-text a {
            display: inline-block;
            padding: 12px 22px;
            background: #2ecc71;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .hero-image {
            width: 45%;
        }

        .hero-image img {
            width: 100%;
            border-radius: 12px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
            }

            .hero-text,
            .hero-image {
                width: 100%;
            }

            .hero-image {
                margin-top: 40px;
            }
            
        }
        /* ===== SECTION ===== */
.section {
    background: #f9f9f9;
    padding: 80px 60px;
}

.container {
    max-width: 900px;
    margin: auto;
    text-align: center;
}

.container h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

.container p {
    font-size: 16px;
    color: #555;
    line-height: 1.7;
}

/* ===== FOOTER ===== */
footer {
    padding: 20px;
    text-align: center;
    font-size: 13px;
    color: #777;
    border-top: 1px solid #eee;
}

    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h1>📝 NotesApp</h1>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="about.php">About</a>
            <a href="auth/login.php" class="btn">Login</a>
        </div>
    </div>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-text">
            <h2>Catat Ide.<br>Simpan Pikiran.</h2>
            <p>
                NotesApp membantu kamu menyimpan catatan penting,
                ide random, dan rencana harian dengan aman dan rapi.
                Akses kapan saja, di mana saja.
            </p>
            <a href="auth/register.php">Mulai Sekarang</a>
        </div>

        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4"
                 alt="Notes Illustration">
        </div>
    </section>
   
<div class="section">
    <div class="container">
        <h2>Kenapa Notes App?</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
        </p>
    </div>
</div>

<footer>
    © 2025 Notes App — PHP Native Project
</footer>

</body>
</html>
