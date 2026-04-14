<?php
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_product'])) {

    $product = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = [];
    }

    $_SESSION['products'][] = $product;

    header("Location: shop.php");
    exit();
}
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
                    echo "Guest";   chr
                    
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
<section id="add-product" class="page-section">
<div class="container">

<a href="admin.php">
    <button class="btn">& Back to Dashboard</button>
</a>

<h1>Add New Product</h1>

<div class="category-nav">
    <button class="active">New Added</button>
</div>

<div style="background: white; padding: 40px; border-radius: 20px; max-width: 800px; margin-top: 20px;">

<form method="POST">

<div class="input-group">
    <label>Product Name</label>
    <input type="text" name="name" class="form-control" required>
</div>

<div class="input-group">
    <label>Price ($)</label>
    <input type="number" name="price" class="form-control" required>
</div>

<div class="input-group">
    <label>Image URL</label>
    <input type="text" name="image" class="form-control" required>
</div>

<button type="submit" name="add_product" class="btn btn-filled">
    Add Product (+)
</button>

</form>

</div>
</div>
</section>
</main>

</body>
</html>