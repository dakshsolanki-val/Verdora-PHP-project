<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logged Out - Verdora</title>

<style>
:root {
    --bg-color: #FDFCF5;
    --primary-green: #4A6741;
    --dark-green: #2C3E28;
    --accent-clay: #C19A6B;
    --accent-light: #D4E2D4;
    --white: #ffffff;
    --shadow: 0 10px 30px rgba(74, 103, 65, 0.1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: var(--bg-color);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* Background blobs */
.bg-left {
    position: absolute;
    width: 400px;
    height: 400px;
    background: var(--accent-light);
    border-radius: 50%;
    top: 10%;
    left: -100px;
}

.bg-right {
    position: absolute;
    width: 300px;
    height: 300px;
    background: #E8D8C3;
    border-radius: 50%;
    bottom: 10%;
    right: -100px;
}

/* Main Card */
.logout-box {
    background: var(--white);
    padding: 50px 40px;
    border-radius: 20px;
    text-align: center;
    box-shadow: var(--shadow);
    max-width: 400px;
    width: 90%;
}

/* Title */
.logout-box h1 {
    font-family: 'Playfair Display', serif;
    color: var(--primary-green);
    font-size: 2.5rem;
}

/* Subtitle */
.logout-box p {
    margin-top: 10px;
    color: #666;
}

/* Message */
.message {
    margin: 25px 0;
    font-size: 1.1rem;
    color: var(--dark-green);
}

/* Button */
.btn {
    display: inline-block;
    margin-top: 15px;
    padding: 12px 30px;
    background: var(--primary-green);
    color: white;
    border-radius: 25px;
    text-decoration: none;
    transition: 0.3s;
}

.btn:hover {
    background: var(--dark-green);
}

/* Login link */
.login-link {
    margin-top: 20px;
    display: block;
    font-size: 0.9rem;
}

.login-link a {
    color: var(--accent-clay);
    text-decoration: none;
    font-weight: 500;
}

.login-link a:hover {
    text-decoration: underline;
}

</style>
</head>

<body>

<div class="bg-left"></div>
<div class="bg-right"></div>

<div class="logout-box">
    <h1>Verdora</h1>
    <p>green meets clean</p>

    <div class="message">
        ✅ You have been logged out
    </div>

    <a href="visitor.php" class="btn">Go to Home</a>

    <div class="login-link">
        Want to log back in? <a href="login.php">Login here</a>
    </div>
</div>

</body>
</html>