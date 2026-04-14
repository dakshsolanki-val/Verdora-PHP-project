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
            <section id="product-detail" class="page-section">
            <div class="container">
            <a href="shop.php">
                <button class="btn"style="margin-bottom: 20px;">&larr; Back to Shop</button>
            </a>
                
                <div class="detail-layout">
                    <div class="detail-image">
                        <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?auto=format&fit=crop&q=80&w=800" alt="Product Detail">
                    </div>
                    <div class="detail-content">
                        <h1>Classic Clay Core Pot</h1>
                        <div class="detail-price">$24.99</div>
                        <p style="margin-bottom: 30px;">
                            This 100% biodegradable pot allows for natural root expansion. 
                            Comes with a decorative outer shell. Perfect for indoor Monsteras and Ferns.
                            Degrades over 2 years naturally.
                        </p>

                        <div class="input-group">
                            <label>Degradation Timeline (Strength)</label>
                            <select class="form-control">
                                <option>1 Year</option>
                                <option selected>2 Years</option>
                                <option>3 Years</option>
                                <option>5 Years (Max Strength)</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="1" min="1">
                        </div>

                        <div class="input-group">
                            <label>Preferred Delivery Date & Time</label>
                            <input type="datetime-local" class="form-control">
                        </div>
                    <a href="placeorder.php">
                        <button class="btn btn-filled" style="margin-bottom: 20px;">Place Order Now</button>
                    </a>

                    <form action="cart.php" method="post">

                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="product_name" value="Classic Clay Core Pot">
                    <input type="hidden" name="price" value="24.99">

                    <button type="submit" name="add_to_cart" class="btn btn-filled">
                        Add to Cart
                    </button>

                     </form>
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