<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up - EcoRoot</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700;900&family=Work+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="main.css">
    </head>
    <body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "registrationdb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['signup'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `registered_user` (`Full Name`, `Email Address`, `Create Password`) 
                VALUES ('$name', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
           $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;

            header("Location: user.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

            <nav id="main-nav">
            <div class="logo">
            <img src="images/minlogo.png" alt="" class="mainlogo">
            </div>
            
            <div class="nav-links">
                <a href="visitor.php">Home</a>
                <a href="shop.php">Shop</a>
                <a href="community.php">Community</a>
            </div>

    
            </nav>
        
    <section class="signupsection">
        <div class="auth-wrapper">

            <div class="auth-box signup-box">
                <div class="auth-header">
                    <h2>Create Account</h2>
                    <p>Join the Verdora green community</p>
                </div>

                <form action="signup.php" method="post">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="John Doe" name="name">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="john@example.com" name = "email">
                    </div>

                    <div class="form-group">
                        <label>Create Password</label>
                        <input type="password" class="form-control" placeholder="Create a secure password" name ="password">
                    </div>

                    
                    <button type="submit" class="btn btn-outline" style="margin-top: 20px;" name = "signup">
                        Sign Up
                    </button>
                    
                </form>
                <p>Already have an account <a href="login.php"><span>login?</span></a></p>
            </div>

        </div>
    </section>

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
