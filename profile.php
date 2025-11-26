<?php
session_start();
include("db.php");


if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];


$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


$don_sql = "SELECT * FROM donations WHERE user_id = $user_id ORDER BY date DESC";
$don_res = mysqli_query($conn, $don_sql);


$adopt_sql = "SELECT * FROM adoptions WHERE user_id = $user_id ORDER BY date DESC";
$adopt_res = mysqli_query($conn, $adopt_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - My Profile</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2c3e50;
            --light-bg: #f0f4f8;
            --text-dark: #333;
            --text-light: #555;
            --white: #ffffff;
        }

        body {
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-bg);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: var(--white);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            possition: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8em;
            font-weight: 700;
            color: var(--secondary-color);
            text-decoration: none;
        }

        nav a {
            font-family: 'Poppins', sans-serif;
            color: var(--secondary-color);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover, nav a.active {
            background-color: var(--primary-color);
            color: var(--white);
        }

        footer {
            text-align: center;
            padding: 40px 20px;
            margin-top: auto;
            background-color: var(--secondary-color);
            color: #aeb9c4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 28px;
            font-size: 1.1em;
            font-weight: bold;
            color: var(--white);
            background-color: var(--primary-color);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-block {
            display: block;
            width: 100%;
            text-align: center;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            margin-top: 40px;
            margin-bottom: 60px;
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
        }

        .profile-sidebar {
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-align: center;
            height: fit-content;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid var(--light-bg);
        }

        .profile-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5em;
            font-weight: 700;
            color: var(--secondary-color);
            margin: 0 0 10px 0;
        }

        .dashboard-section {
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .dashboard-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3em;
            color: var(--secondary-color);
            border-bottom: 2px solid var(--light-bg);
            padding-bottom: 15px;
            margin-bottom: 20px;
            margin-top: 0;
        }

        .pet-list-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.2s;
        }

        .pet-list-item:hover {
            transform: translateX(5px);
            border-color: var(--primary-color);
        }

        .pet-list-img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 20px;
        }

        .status-badge {
            margin-left: auto;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
            color: white;
        }

        .status-pending { background-color: #f39c12; }
        .status-approved { background-color: #27ae60; }
    </style>
</head>
<body>

<?php include("header.php"); ?>


<div class="container">
    <div class="profile-grid">
        
        <!-- Sidebar -->
        <aside class="profile-sidebar">
            <img src="" class="profile-avatar">

            <h2 class="profile-name"><?php echo $user['name']; ?></h2>

            <div style="text-align: left; margin-top: 20px;">
                <p><i class="fas fa-envelope" style="color: var(--primary-color); width: 20px;"></i> <?php echo $user['email']; ?></p>
                <p><i class="fas fa-phone" style="color: var(--primary-color); width: 20px;"></i> <?php echo $user['phone']; ?></p>
            </div>

            <button class="button btn-block" style="margin-top: 20px; background-color: var(--secondary-color);">Edit Profile</button>

            <a href="logout.php">
                <button class="button btn-block" style="margin-top: 10px; background-color: transparent; color: #e74c3c; border: 1px solid #e74c3c;">Log Out</button>
            </a>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="profile-content">

<!-- ADOPTION APPLICATIONS -->
<div class="dashboard-section">
    <h3 class="dashboard-title">Adoption Applications</h3>

    <?php if(mysqli_num_rows($adopt_res) == 0){ ?>

        <p style="color:#777; font-style: italic;">You have not submitted any adoption applications yet.</p>

    <?php } else { ?>

        <p style="color:#3498db; font-weight:bold;">You have submitted adoption applications for:</p>

        <ul style="margin-top:10px; color:#333; line-height:1.6;">
            <?php while($adopt = mysqli_fetch_assoc($adopt_res)){ ?>
                <li><?php echo $adopt['pet_name']; ?></li>
            <?php } ?>
        </ul>

    <?php } ?>
</div>



 
<!-- DONATIONS -->
<div class="dashboard-section">
    <h3 class="dashboard-title">Your Donations</h3>

    <?php if(mysqli_num_rows($don_res) == 0){ ?>

        <p style="color:#777; font-style: italic;">You have not donated yet.</p>

    <?php } else { ?>

        <?php while($don = mysqli_fetch_assoc($don_res)){ ?>
            <div class="pet-list-item" style="border-left:4px solid #27ae60;">
                <div class="pet-list-info">
                    <h4>₹<?php echo $don['amount']; ?> donated</h4>
                    <p><strong>Message:</strong> 
                        <?php echo ($don['message'] ? $don['message'] : "No message"); ?>
                    </p>
                    <p style="font-size:0.8em; color:#888;">Date: <?php echo $don['date']; ?></p>
                </div>
            </div>
        <?php } ?>

    <?php } ?>
</div>
</main>
</div>
</div>

    <footer>
    <p>Paws & Claws — Because every animal deserves a safe, loving home.</p>
    <p>&copy; 2025 Paws & Claws | All Rights Reserved</p>
</footer>

</body>
</html>
