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
        <section id="thank-you" class="page-section">
        <div class="container" style="text-align: center; padding-top: 50px;">
            <div style="width: 100px; height: 100px; background: var(--primary-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px auto; color: white; font-size: 40px;">✓</div>
            <h1>Thank You!</h1>
            <p style="font-size: 1.2rem; color: #666;">Your order has been placed successfully.</p>
            
            <div style="margin-top: 50px;">
                <h3>Shop More With Us</h3>
                <p>Complete your garden with these essentials</p>
                <br>
                <div class="products-grid">
                     <a href="shop.php">
                        <div class="product-card">
                        <div class="product-img" style="height: 200px;">
                            <img src="https://images.unsplash.com/photo-1599598425947-3211246522eb?auto=format&fit=crop&q=80&w=400" alt="Soil">
                        </div>
                        <div class="product-info">
                            <h4>Organic Soil</h4>
                        </div>
                    </div>
                     </a>
                     <a href="shop.php">
                        <div class="product-card">
                        <div class="product-img" style="height: 200px;">
                            <img src="https://images.unsplash.com/photo-1520412099551-62b6bafeb5bb?auto=format&fit=crop&q=80&w=400" alt="Seeds">
                        </div>
                        <div class="product-info">
                            <h4>Sunflower Seeds</h4>
                        </div>
                    </div>
                     </a>
                   <a href="shop.php">
                     <div class="product-card">
                        <div class="product-img" style="height: 200px;">
                            <img src="https://images.unsplash.com/photo-1520412099551-62b6bafeb5bb?auto=format&fit=crop&q=80&w=400" alt="Seeds">
                        </div>
                        <div class="product-info">
                            <h4>Sunflower Seeds</h4>
                        </div>
                    </div>
                   </a>
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