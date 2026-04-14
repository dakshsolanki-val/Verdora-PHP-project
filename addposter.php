<?php
session_start();

if (isset($_POST['upload_poster'])) {

    if (!isset($_FILES['poster']) || $_FILES['poster']['error'] !== 0) {
        header("Location: shop.php?error=file");
        exit();
    }

    // ✅ Create folder if not exists
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // ✅ File type validation
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($_FILES['poster']['type'], $allowedTypes)) {
        header("Location: shop.php?error=type");
        exit();
    }

    $fileName = $_FILES['poster']['name'];
    $tempName = $_FILES['poster']['tmp_name'];

    $uniqueName = time() . "_" . basename($fileName);
    $target = "uploads/" . $uniqueName;

    if (move_uploaded_file($tempName, $target)) {

        if (!isset($_SESSION['posters'])) {
            $_SESSION['posters'] = [];
        }

        $_SESSION['posters'][] = $target;

        header("Location: shop.php?success=1");
        exit();

    } else {
        header("Location: shop.php?error=move");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Poster</title>
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
<section id="add-poster" class="page-section">
<div class="container">

<a href="admin.php"><button class="btn">&larr; Back</button></a>

<h1>Add New Marketing Poster</h1>

<div style="background: white; padding: 40px; border-radius: 20px; max-width: 600px;">

<form method="POST" enctype="multipart/form-data">

<div class="input-group">
    <label>Upload Photo</label>
    <input type="file" name="poster" class="form-control" required>
</div>

<button type="submit" name="upload_poster" class="btn btn-filled">
    Upload
</button>

</form>

</div>
</div>
</section>
</main>

</body>
</html>