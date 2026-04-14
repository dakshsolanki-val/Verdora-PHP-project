<?php
session_start();

// ADD QUESTION
if (isset($_POST['post_question'])) {

    $question = $_POST['question'];

    if (!isset($_SESSION['questions'])) {
        $_SESSION['questions'] = [];
    }

    $_SESSION['questions'][] = [
        'text' => $question,
        'yes' => 0,
        'no' => 0
    ];

    header("Location: community.php");
    exit();
}

// HANDLE VOTING
if (isset($_GET['vote']) && isset($_GET['index'])) {

    $index = $_GET['index'];

    if (isset($_SESSION['questions'][$index])) {

        if ($_GET['vote'] == "yes") {
            $_SESSION['questions'][$index]['yes']++;
        } else {
            $_SESSION['questions'][$index]['no']++;
        }
    }

    header("Location: community.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verdora - Community</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet">
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

<section class="mainsetion"b style="margin-top: 40px;">
<div class="container">

<!-- HEADER -->
<div class="page-header">
    <h1>Verdora Community</h1>
    <p>Ask questions and get answers</p>
</div>

<!-- ASK QUESTION -->
<div class="ask-box">
    <h3>Ask the Community</h3>

    <form method="POST" action="community.php">
        <textarea name="question" class="form-control" placeholder="Ask something..." required></textarea>
        <button type="submit" name="post_question" class="btn">Post Question</button>
    </form>
</div>

<h2 class="feed-title">Recent Questions</h2>

<?php
if (isset($_SESSION['questions']) && count($_SESSION['questions']) > 0) {

    foreach ($_SESSION['questions'] as $index => $q) {
?>

<div class="question-card">

    <div class="question-text">
        "<?php echo htmlspecialchars($q['text']); ?>"
    </div>

    <div class="voting-section">

        <a href="community.php?vote=yes&index=<?php echo $index; ?>">
            <button class="vote-btn yes">✓ Yes</button>
        </a>

        <a href="community.php?vote=no&index=<?php echo $index; ?>">
            <button class="vote-btn no">✕ No</button>
        </a>

        <span class="vote-count">
            <?php echo $q['yes']; ?> Yes • <?php echo $q['no']; ?> No
        </span>

    </div>

</div>

<?php
    }

} else {
    echo "<p>No questions yet. Be the first to ask!</p>";
}
?>

</div>
</section>

<footer class="main-footer">
    <div class="footer-content">
        <div class="footer-col">
            <h3>Verdora</h3>
            <p>Green meets clean.</p>
        </div>

        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="visitor.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="community.php">Community</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; 2025 Verdora
    </div>
</footer>

</body>
</html>z