<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: signup.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verdora - Home</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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
        <!-- ==========================================
             SECTION 1: HERO & EXPLANATION
             ========================================== -->
        <section id="landing" class="page-section active">

            <div class="bg-blob" style="top: 10%; left: -5%; width: 400px; height: 400px; background: var(--primary-green); opacity: 0.3;"></div>
            <div class="bg-blob" style="top: 50%; right: -10%; width: 500px; height: 600px; background: var(--accent-clay); opacity: 0.3;"></div>

            <!-- Hero Section -->
            <div class="hero">
                <div class="hero-box">
                    <h1>Verdora</h1>
                    <p>green meets clean</p>

                    <!-- User Account Hover -->
                    <div class="user-container">
                        <div class="user-trigger">
                            <div style="width: 30px; height: 30px; background: #C19A6B; border-radius: 50%;"></div>
                            <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
                        </div>
                        
                        <div class="user-dropdown" style="display: none;">
                            <div class="user-detail-row">
                                <strong>Name:</strong> <span><?php echo $_SESSION['user_name']; ?></span>
                            </div>
                            <div class="user-detail-row">
                                <strong>Membership:</strong> <span style="color: #C19A6B;">Green Tier</span>
                            </div>
                            <div class="user-detail-row">
                                <strong>Email:</strong> <span><?php echo $_SESSION['user_email']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Side-by-Side User Actions -->
                    <div class="user-actions">
                        <a href="cart.php">
                            <button class="btn btn-filled">Cart</button>
                        </a>
                        <a href="watch.php">
                            <button class="btn">Watchlist</button>
                        </a>
                    </div>
                </div>

                <!-- Community Promo Button (Bottom Right) -->
                <div class="community-promo">
                    <p>Need plant advice? Join 5,000+ members!</p>
                    <a href="community.php">
                        <button class="btn btn-outline" style="padding: 8px 25px; font-size: 0.9rem;">Join Community →</button>
                    </a>
                </div>
            </div>

            <div class="landing-wrapper">
                <div class="project-explanation">
                    <div class="project-text">
                        <h2>The Organic Solution</h2>
                        <br>
                        <p>Standard plastic pots restrict root growth, causing plants to suffocate. Verdora introduces biodegradable organic pots that degrade over time, allowing roots to spread naturally.</p>
                        <br>
                        <p>Designed for indoor longevity, our pots feature a decorative outer shell that supports the organic core. Customize your strength duration from 1 to 5 years. When the pot begins to degrade, it's nature's reminder to water your plant, ensuring a thriving green ecosystem in your home.</p>
                    </div>
                    <!-- Your specified image element -->
                    <div class="project-image"></div>
                </div>
            </div>
        </section>

        <!-- ==========================================
             SECTION 2: FEATURES GRID
             ========================================== -->
        <section class="features-section">
            <div class="landing-wrapper">
                <h2 class="section-title">Why Choose Verdora?</h2>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🌿</div>
                        <h3>Breathable Roots</h3>
                        <p>Unlike plastic, our organic materials allow oxygen to reach the roots, preventing rot and promoting healthier, faster plant growth.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">⏱️</div>
                        <h3>Custom Lifespan</h3>
                        <p>Choose your pot's durability. Whether you need it to last 1 year for fast growers or 5 years for slow growers, you are in control.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">💧</div>
                        <h3>Natural Indicators</h3>
                        <p>Forget to water? The organic material safely signals you when it's dry, acting as a natural reminder before the plant suffers.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==========================================
             SECTION 3: HOW IT WORKS
             ========================================== -->
        <section class="how-it-works-section">
            <div class="landing-wrapper">
                <h2 class="section-title">A Greener Process</h2>
                
                <div class="steps-container">
                    <div class="step-box">
                        <div class="step-number">01</div>
                        <div class="step-content">
                            <h4>Select Your Outer Shell & Core</h4>
                            <p>Pick a beautiful, reusable outer shell to match your home decor, and pair it with our 100% biodegradable inner core.</p>
                        </div>
                    </div>

                    <div class="step-box" style="border-left-color: var(--accent-clay);">
                        <div class="step-number">02</div>
                        <div class="step-content">
                            <h4>Set the Degradation Timeline</h4>
                            <p>Select a 1 to 5-year timeline. The pot will maintain its structural integrity perfectly until it's time for the plant to spread its roots further.</p>
                        </div>
                    </div>

                    <div class="step-box">
                        <div class="step-number">03</div>
                        <div class="step-content">
                            <h4>Grow & Repot Naturally</h4>
                            <p>Once the timeline ends, the inner pot begins to safely degrade into nutrient-rich soil. Simply lift the plant and place it into a larger setup without root shock.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ==========================================
         SECTION 4: FOOTER
         ========================================== -->
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