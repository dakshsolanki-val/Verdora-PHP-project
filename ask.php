<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<nav id="main-nav">
    <div class="logo">
        <img src="images/minlogo.png" class="mainlogo">
    </div>

    <div class="nav-links">
        <a href="<?php 
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
            echo 'admin.php';
        } elseif (isset($_SESSION['user_name'])) {
            echo 'user.php';
        } else {
            echo 'visitor.php';
        }
        ?>">Home</a>

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

        <div class="user-menu">
            <img src="images/profile.png" height="50px" width="50px">

            <div class="user-dropdown">

                <p><b>
                <?php 
                if (isset($_SESSION['admin'])) {
                    echo "Admin";
                } elseif (isset($_SESSION['user_name'])) {
                    echo $_SESSION['user_name'];
                } else {
                    echo "Guest";
                }
                ?>
                </b></p>

                <p style="font-size: 0.8rem;">
                <?php 
                if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_email'];
                }
                ?>
                </p>

                <hr>

                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="admin.php">Dashboard</a>
                <?php else: ?>
                    <a href="mygarden.php">My Garden</a>
                <?php endif; ?>

                <a href="logout.php" style="color:red;">Logout</a>

            </div>
        </div>
    </div>
</nav>
    <main>
          <section id="community" class="page-section">
        <div class="container">
            <h1 style="text-align: center; margin-bottom: 40px;">Green Communities</h1>
            
            <div class="admin-dashboard"> 
                <div class="admin-card">
                    <div style="width: 60px; height: 60px; background: var(--accent-clay); border-radius: 50%; margin: 0 auto 15px auto;"></div>
                    <h3>Urban Jungle Club</h3>
                    <p>1,240 Members</p>
                    <p style="font-size: 0.9rem; color: #777; margin: 10px 0;">Share tips on indoor planting and organic pot maintenance.</p>
                    <button class="btn">Join Group</button>
                </div>

                <div class="admin-card">
                    <div style="width: 60px; height: 60px; background: var(--primary-green); border-radius: 50%; margin: 0 auto 15px auto;"></div>
                    <h3>Sustainable Living</h3>
                    <p>5,800 Members</p>
                    <p style="font-size: 0.9rem; color: #777; margin: 10px 0;">Discussing biodegradable materials and zero waste.</p>
                    <button class="btn">Join Group</button>
                </div>
            </div>
        </div>
    </section>

    </main>
       <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-col">
                <h3 style="font-family: 'Playfair Display'; font-size: 2rem; color: var(--white);">Verdora</h3>
                <p style="color: #ccc; font-size: 0.9rem;">Revolutionizing indoor planting with smart, biodegradable solutions. Green meets clean.</p>
            </div>
            
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="visitor.php">Home</a></li>
                    <li><a href="shop.php">Shop Pots</a></li>
                    <li><a href="shop.php">Organic Seeds</a></li>
                    <li><a href="community.php">Community Forum</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Customer Care</h3>
                <ul>
                    <li><a href="mygarden.php">My Garden (Account)</a></li>
                    <li><a href="#">Track Order</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 Verdora. All Rights Reserved.
        </div>
    </footer>
</body>
</html>