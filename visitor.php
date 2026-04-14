<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verdora - Home</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>

<body>

<div class="intro-overlay">
    <div class="intro-logo">
        <img src="images/minlogo.png" class="mainlogo" style="filter: brightness(0) invert(1);">
        <h1 style="color: var(--bg-color); font-family: 'Playfair Display'; margin-top: 15px;">Verdora</h1>
    </div>
    <div class="intro-curtain-line"></div>
</div>

<div class="main-content-wrapper">

    <nav id="main-nav">
        <div class="logo">
            <img src="images/minlogo.png" class="mainlogo">
        </div>

        <div class="nav-links">
            <a href="visitor.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="community.php">Community</a>
        </div>

        <div class="nav-icons">
            <a href="watch.php">
                <img src="images/whishlist.png" height="50px" width="50px">
            </a>
            <a href="cart.php">
                <img src="images/cart.png" height="50px" width="50px">
            </a>
        </div>
    </nav>


    <main>
        <section id="landing" class="page-section active">

            <div class="hero">
                <div class="hero-box">
                    <h1>Verdora</h1>
                    <p>green meets clean</p>

                    <a href="shop.php">
                        <button class="btn btn-filled">Shop Now</button>
                    </a>

                    <?php if (isset($_SESSION['user_name'])): ?>
                        <a href="user.php">
                            <button class="btn" style="margin-top: 10px;">
                                Go to Dashboard
                            </button>
                        </a>
                    <?php else: ?>
                        <a href="login.php">
                            <button class="btn" style="margin-top: 10px;">
                                Login / Sign Up
                            </button>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

        </section>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-col">
                <h3 style="font-family: 'Playfair Display'; color: white;">Verdora</h3>
                <p style="color: #ccc;">Green meets clean.</p>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; 2025 Verdora. All Rights Reserved.
        </div>
    </footer>

</div>

</body>
</html>