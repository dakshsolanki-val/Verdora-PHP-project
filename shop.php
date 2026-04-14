<?php
session_start();

if (isset($_GET['remove']) && isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

    $index = $_GET['remove'];

    if (isset($_SESSION['products'][$index])) {
        unset($_SESSION['products'][$index]);
        $_SESSION['products'] = array_values($_SESSION['products']);
    }

    header("Location: shop.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<!-- SUCCESS / ERROR MESSAGE -->
<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red; text-align:center;'>Upload failed</p>";
}
if (isset($_GET['success'])) {
    echo "<p style='color:green; text-align:center;'>Upload success</p>";
}
?>

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
<section id="shop" class="page-section">

<!-- POSTERS -->
<?php
if (!empty($_SESSION['posters'])) {

    foreach ($_SESSION['posters'] as $poster) {
?>
<div class="promo-banner" style="margin:20px;">
    <img src="<?php echo $poster; ?>" style="width:100%; border-radius:20px;">
</div>
<?php
    }

} else {
?>
<div class="promo-banner" style="margin:20px;">
    <h2>Spring Sale</h2>
</div>
<?php } ?>


<!-- PRODUCTS -->
<div class="products-grid">

<?php
if (!empty($_SESSION['products'])) {

    foreach ($_SESSION['products'] as $index => $product) {
?>

<div class="product-card" style="margin-left: 20px;">
    
    <!-- CLICKABLE IMAGE → GO TO DETAILS -->
    <a href="productdetails.php?index=<?php echo $index; ?>" style="text-decoration:none; color:inherit;">
        <div class="product-img">
            <img src="<?php echo $product['image']; ?>" alt="">
        </div>

        <div class="product-info">
            <h3><?php echo $product['name']; ?></h3>
            <p>$<?php echo $product['price']; ?></p>
        </div>
    </a>

    <form method="POST" action="cart.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">

        <button type="submit" name="add_to_cart" class="btn" style="margin-top:10px;">
            Add to Cart
        </button>
    </form>

    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
        <a href="shop.php?remove=<?php echo $index; ?>">
            <button class="btn" style="margin-top:10px; color:white;">
                Remove
            </button>
        </a>
    <?php endif; ?>

</div>

<?php
    }

} else {
    echo "<p style='margin:20px;'>No products added yet</p>";
}
?>

</div>

</section>
</main>

</body>
</html>