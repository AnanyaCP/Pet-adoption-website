
<?php include("header.php"); ?>

<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm-password'];

    // combine phone
    $final_phone = $country_code . " " . $phone;

    // check password match
    if ($password !== $confirm) {
        echo "<h3 style='color:red;text-align:center;'>❌ Passwords do not match!</h3>";
        exit;
    }

    // insert query
    $sql = "INSERT INTO users (name, email, phone, password)
            VALUES ('$name', '$email', '$final_phone', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Signup Successful!');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Sign Up</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- INTERNAL CSS -->
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
            position: sticky;
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
        .button:hover { background-color: var(--primary-dark); transform: translateY(-2px); }
        .btn-block { display: block; width: 100%; text-align: center; }

     
        .form-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 20px;
        }

        .form-box {
            background-color: var(--white);
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .form-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2em;
            font-weight: 700;
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 30px;
            margin-top: 0;
        }

        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 0.95em;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-size: 1em;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95em;
        }

        .form-footer a {
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
        }
        .form-footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>


    <!-- Main Content -->
    <main class="form-wrapper">
        
        <!-- Sign Up Card -->
        <div class="form-box">
            <h2 class="form-title">Create Account</h2>
            
            <!-- Form connects to backend script (e.g., register.php) -->
            <form action=" " method="POST">
                
                <!-- Name Input -->
                <div class="form-group">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Enter your name" required>
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" required>
                </div>

                <!-- Phone Number with Country Code -->
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div style="display: flex; gap: 10px;">
                        <!-- Country Code Selector -->
                        <select name="country_code" class="form-input" style="width: 120px; padding-right: 5px;">
                            <option value="+91" selected>🇮🇳 +91</option>
                            <option value="+1">🇺🇸 +1</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+61">🇦🇺 +61</option>
                            <option value="+81">🇯🇵 +81</option>
                            <option value="+49">🇩🇪 +49</option>
                            <option value="+33">🇫🇷 +33</option>
                            <option value="+86">🇨🇳 +86</option>
                        </select>
                        <!-- Phone Input -->
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="98765 43210" style="flex-grow: 1;" required>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" required>
                </div>

                <!-- Confirm Password Input -->
                <div class="form-group">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-input" placeholder="Confirm your password" required>
                </div>

                <!-- Sign Up Button -->
                <button type="submit" class="button btn-block">Sign Up</button>
            </form>

            <!-- Login Link -->
            <div class="form-footer">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>

    </main>

      <footer>
    <p>Paws & Claws — Because every animal deserves a safe, loving home.</p>
    <p>&copy; 2025 Paws & Claws | All Rights Reserved</p>
</footer>


</body>
</html>
