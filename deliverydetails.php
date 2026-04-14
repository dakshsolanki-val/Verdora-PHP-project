<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Orders</title>
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
<section class="page-section">
<div class="container">

<h1 style="text-align:center; margin-bottom:30px;">Your Orders</h1>

<div class="delivery-board">

<?php
if (!empty($_SESSION['orders'])) {

    foreach ($_SESSION['orders'] as $order) {
?>

<div class="delivery-column">

<h3>Order #<?php echo $order['id']; ?></h3>

<div class="delivery-card">

<strong>User:</strong> <?php echo $order['user']; ?><br><br>

<strong>Items:</strong><br>
<?php
if (!empty($order['items'])) {
    foreach ($order['items'] as $item) {
        echo "- " . $item['name'] . " ($" . $item['price'] . ")<br>";
    }
} else {
    echo "No items";
}
?>

<br>

<strong>Address:</strong><br>
<?php echo $order['address']; ?><br><br>

<strong>Payment:</strong> <?php echo $order['payment']; ?><br>
<strong>Status:</strong> <?php echo $order['status']; ?>

</div>

</div>

<?php
    }

} else {
    echo "<p style='text-align:center;'>No orders yet</p>";
}
?>

</div>

</div>
</section>
</main>

</body>
</html>