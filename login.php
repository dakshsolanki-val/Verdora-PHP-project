<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "registrationdb");

$error = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔥 ADMIN LOGIN
    if ($email === "dhyanesh@verdora.com" && $password === "dhyanesh123") {

        // ✅ CLEAR USER SESSION
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        $_SESSION['admin'] = true;
        $_SESSION['admin_name'] = "Admin";

        header("Location: admin.php"); 
        exit();
    }

    // 🔥 USER LOGIN
    $sql = "SELECT * FROM `registered_user` WHERE `Email Address`='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($password == $row['Create Password']) {

            $_SESSION['user_name'] = $row['Full Name'];
            $_SESSION['user_email'] = $row['Email Address'];

            // ✅ CLEAR ADMIN SESSION
            unset($_SESSION['admin']);

            header("Location: user.php");
            exit();
            
        } else {
            $error = "Wrong Password";
        }

    } else {
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verdora - Login</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="main.css">
</head>

<body>

<nav id="main-nav">
    <div class="logo">
        <img src="images/minlogo.png" class="mainlogo">
    </div>

    <div class="nav-links" style="margin-right: 30px;">
        <a href="visitor.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="community.php">Community</a>
    </div>
</nav>

<section class="loginsection" style="margin-top: 50px;">
<div class="auth-wrapper">

<div class="auth-box login-box">
    <div class="auth-header">
        <h2>Welcome Back</h2>
        <p>Login to your Verdora account</p>
    </div>
    
    <?php if ($error != ""): ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="login" class="btn">Login</button>

        <p>Don't have an account? <a href="signup.php">Sign up</a></p>

    </form>
</div>

</div>
</section>

</body>
</html>