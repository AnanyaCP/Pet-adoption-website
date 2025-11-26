
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <a href="index.php" class="logo">Paws & Claws</a>
    <nav>
        <a href="index.php">Home</a>
        <a href="ourpets.php">Our Pets</a>
        <a href="donate.php">Donate</a>
        <a href="contact.php">Contact us</a>
         

        <?php if(isset($_SESSION['user_id'])) { ?>
            <!-- Show Profile when logged in -->
            <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
        <?php } else { ?>
            <!-- Show Login when NOT logged in -->
            <a href="login.php">Login</a>
        <?php } ?>
    </nav>
</header>
