<?php
session_start();

// CHECK LOGIN FIRST
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user_name'];

// ADD TO CART
if (isset($_POST['add_to_cart'])) {

    $product = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => $_POST['price'],
        'quantity' => 1 
    ];

    if (!isset($_SESSION['cart'][$user])) {
        $_SESSION['cart'][$user] = [];
    }

    $_SESSION['cart'][$user][] = $product;

    header("Location: cart.php");
    exit();
}

// REMOVE FROM CART
if (isset($_GET['index'])) {

    $index = $_GET['index'];

    if (isset($_SESSION['cart'][$user][$index])) {
        unset($_SESSION['cart'][$user][$index]);
        $_SESSION['cart'][$user] = array_values($_SESSION['cart'][$user]);
    }

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
<section id="cart" style="margin-top: 50px;">
<div class="container">

<h1>Your Cart</h1>

<?php
$total = 0;

if (isset($_SESSION['cart'][$user]) && count($_SESSION['cart'][$user]) > 0) {

    foreach ($_SESSION['cart'][$user] as $index => $item) {

        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
?>

<div class="cart-item">
    <div>
        <h3><?php echo $item['name']; ?></h3>
        <p>Quantity: <?php echo $item['quantity']; ?></p>
    </div>

    <div>
        $<?php echo $subtotal; ?>
    </div>

    <a href="cart.php?index=<?php echo $index; ?>">
        <button style="color:red; margin-left: 450px;">✕</button>
    </a>
</div>

<?php
    }

} else {
    echo "<p>Your cart is empty</p>";
}
?>

<div style="text-align:right;">
    <h3>Total: $<?php echo $total; ?></h3>
    <a href="placeorder.php">
        <button class="btn btn-filled">Checkout</button>
    </a>
</div>

</div>
</section>
</main>

</body>
</html>