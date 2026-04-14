<?php
session_start();

// PLACE ORDER LOGIC
if (isset($_POST['place_order'])) {

    if (!isset($_SESSION['orders'])) {
        $_SESSION['orders'] = [];
    }

    $order = [
        'id' => rand(1000,9999),
        'user' => $_SESSION['user_name'] ?? 'Guest',
        'items' => $_SESSION['cart'] ?? [],
        'address' => $_POST['address'],
        'notes' => $_POST['notes'],
        'payment' => $_POST['payment'],
        'status' => 'Pending'
    ];

    $_SESSION['orders'][] = $order;

    unset($_SESSION['cart']);

    header("Location: deliverydetails.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
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
<section id="place-order" class="page-section">
<div class="container">

<h2 style="text-align: center; margin-bottom: 40px;">Checkout</h2>

<div style="max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px;">

<form method="POST">

<div class="input-group">
    <label>Shipping Address</label>
    <textarea name="address" class="form-control" required></textarea>
</div>

<div class="input-group">
    <label>Order Notes</label>
    <input type="text" name="notes" class="form-control">
</div>

<div class="input-group">
    <label>Payment Method</label>
    <select name="payment" class="form-control">
        <option>Card</option>
        <option>Cash on Delivery</option>
    </select>
</div>

<button type="submit" name="place_order" class="btn btn-filled" style="width:100%; margin-top:20px;">
    Confirm Order
</button>

</form>

</div>
</div>
</section>
</main>

</body>
</html>