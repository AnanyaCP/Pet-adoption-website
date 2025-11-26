<?php
session_start();
include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

      
        $user = mysqli_fetch_assoc($result);

        
        $_SESSION['user_id'] = $user['id'];

       
        header("Location: profile.php");   
        exit();

    } else {
        echo "<h3 style='color:red; text-align:center;'>Invalid Email or Password!</h3>";
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Login</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Connect to your main CSS file -->
    <link rel="stylesheet" href="style3.css">

</head>
<body>

 <?php include("header.php"); ?>


    <!-- Main Content -->
    <main class="form-wrapper">
        
        <!-- Login Card -->
        <div class="form-box">
            <h2 class="form-title">Welcome Back!</h2>
            
            <form action="login.php" method="POST">
                <!-- Email Input -->
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
                </div>

                <div style="text-align: right; margin-bottom: 20px;">
                    <a href="#" style="font-size: 0.9em; color: var(--primary-color); text-decoration: none;">Forgot Password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="button btn-block">Login</button>
            </form>

            <!-- Sign Up Link -->
            <div class="form-footer">
                <p>Don't have an account? <a href="sign.php">Create one here</a></p>
            </div>
        </div>

    </main>

    <footer>
    <p>Paws & Claws — Because every animal deserves a safe, loving home.</p>
    <p>&copy; 2025 Paws & Claws | All Rights Reserved</p>
</footer>


</body>
</html>