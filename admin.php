<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verdora - Admin Dashboard</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="main.css">
</head>
<body>
    
    <!-- NAVIGATION -->
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
        <!-- Expanded & Enhanced Admin Dashboard -->
        <section id="admin-dashboard" class="page-section admin-page-wrapper">
            
            <div class="bg-blob" style="top: 10%; left: -5%; width: 400px; height: 400px; background: var(--primary-green); opacity: 0.15;"></div>
            
            <div class="container">
                <div class="admin-header">
                    <h1>Admin Dashboard</h1>
                    <p>Welcome back! Here's a quick overview of Verdora today.</p>
                </div>

                <!-- NEW: Admin Stats Overview -->
                <div class="admin-stats-container">
                    <div class="stat-card">
                        <div class="stat-icon" style="color: var(--primary-green);">📦</div>
                        <div class="stat-details">
                            <h4>124</h4>
                            <p>Active Products</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="color: var(--accent-clay);">🚚</div>
                        <div class="stat-details">
                            <h4>18</h4>
                            <p>Pending Deliveries</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="color: var(--dark-green);">💰</div>
                        <div class="stat-details">
                            <h4>$4,250</h4>
                            <p>Sales This Month</p>
                        </div>
                    </div>
                </div>

                <h2 class="admin-section-title">Store Management</h2>
                
                <!-- Enhanced Admin Grid -->
                <div class="admin-dashboard" style="max-width: 1000px; margin: 0 auto;">
                    <a href="addproduct.php" class="admin-card-link">
                        <div class="admin-card enhanced-card">
                            <span class="card-icon" style="font-size: 3rem; color: var(--primary-green);">+</span>
                            <h3>Add New Product</h3>
                            <p>Create new listings for pots, seeds, or soil.</p>
                        </div>
                    </a>
                    
                    <a href="deliverydetails.php" class="admin-card-link">
                        <div class="admin-card enhanced-card">
                            <span class="card-icon" style="font-size: 3rem; color: var(--accent-clay);">🚚</span>
                            <h3>View Delivery Details</h3>
                            <p>Track pending and completed customer orders.</p>
                        </div>
                    </a>
                    
                    <a href="addposter.php" class="admin-card-link">
                        <div class="admin-card enhanced-card">
                            <span class="card-icon" style="font-size: 3rem; color: var(--dark-green);">🖼️</span>
                            <h3>Add Poster</h3>
                            <p>Upload new promotional banners to the shop.</p>
                        </div>
                    </a>
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