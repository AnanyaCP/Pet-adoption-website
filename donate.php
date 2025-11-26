
<?php
session_start();
include("db.php");


$payment_method = isset($_GET['method']) ? $_GET['method'] : 'card';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to donate.'); window.location.href='login.html';</script>";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';
    
    // Logic: Custom input takes priority over radio buttons
    $amount = 0;
    if (!empty($_POST['custom_amount'])) {
        $amount = floatval($_POST['custom_amount']);
    } elseif (isset($_POST['amount'])) {
        $amount = floatval($_POST['amount']);
    }

    // Insert into Database
    if ($amount > 0) {
        $sql = "INSERT INTO donations (user_id, amount, message) VALUES ('$user_id', '$amount', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            // Success: Redirect to profile with success flag
            header("Location: profile.php?status=donated");
            exit();
        } else {
            $error_msg = "Database Error: " . $conn->error;
        }
    } else {
        $error_msg = "Please select or enter a valid donation amount.";
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Donate</title>
    
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
        
        textarea.form-input { resize: vertical; min-height: 100px; }

        .dashboard-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3em;
            color: var(--secondary-color);
            border-bottom: 2px solid var(--light-bg);
            padding-bottom: 15px;
            margin-bottom: 20px;
            margin-top: 0;
        }


        
        /* Hero Section */
        .donate-hero {
            /* Blue Overlay on Image */
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url('https://static2.bigstockphoto.com/3/5/3/large1500/353138717.jpg') no-repeat center center/cover;
            color: var(--white);
            padding: 80px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .donate-hero h1 { font-family: 'Poppins', sans-serif; font-size: 3em; margin-bottom: 10px; }

      
        .donation-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }
        @media (max-width: 768px) {
            .donation-layout { grid-template-columns: 1fr; }
        }

        .donate-card {
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

      
        .amount-options {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .amount-radio { display: none; } 
        
       
        .amount-label { 
            flex: 1; 
            min-width: 80px; 
            border: 2px solid #eee; 
            padding: 15px 10px; 
            text-align: center; 
            border-radius: 10px; 
            cursor: pointer; 
            font-weight: bold; 
            color: var(--secondary-color); 
            display: inline-block; 
            margin-right: 10px; 
            transition: all 0.2s;
        }

        .amount-radio:checked + .amount-label { 
            border-color: var(--primary-color); 
            background-color: var(--primary-color); 
            color: var(--white); 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }


        .upi-apps-icon {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .upi-badge {
            background: #e8f4fc; /* Light blue tint */
            padding: 5px 10px; 
            border-radius: 5px; 
            font-size: 0.8em; 
            font-weight: bold; 
            color: var(--primary-color);
            border: 1px solid rgba(52, 152, 219, 0.2);
        }

  
        .impact-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
            text-align: left;
        }
        .impact-list li {
            margin-bottom: 15px;
            padding-left: 30px;
            position: relative;
            color: #ecf0f1; /* Very light grey for dark background */
        }
        .impact-list li::before {
            content: '❤';
            position: absolute;
            left: 0;
            color: #e74c3c; /* Heart Red */
            font-weight: bold;
        }
    </style>
</head>
<body>

     <?php include("header.php"); ?>

    <!-- Hero Section -->
    <div class="donate-hero">
        <div class="container">
            <h1>Help Us Save Lives</h1>
            <p style="font-size: 1.2em; max-width: 700px; margin: 0 auto;">Your tax-deductible donation helps us provide medical care, food, and shelter to abandoned animals.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="donation-layout">
            
            <!-- Left Column: Donation Form -->
            <div class="donate-card">
                <h2 class="dashboard-title" style="border:none; margin-bottom: 20px;">Make a Donation</h2>
                
                <!-- Form Action can point to a future backend script -->
                <form action="#" method="POST">
                    
                    <!-- Amount Selection -->
                    <div class="amount-options">
                        <input type="radio" name="amount" id="amt-500" class="amount-radio" value="500">
                        <label for="amt-500" class="amount-label">₹500</label>
                        
                        <input type="radio" name="amount" id="amt-1000" class="amount-radio" value="1000" checked>
                        <label for="amt-1000" class="amount-label">₹1000</label>
                        
                        <input type="radio" name="amount" id="amt-2500" class="amount-radio" value="2500">
                        <label for="amt-2500" class="amount-label">₹2500</label>
                    </div>

                    <div class="form-group">
                        <label class="form-label" style="font-size: 0.9em; color: #666;">Or enter custom amount (₹)</label>
                        <input type="number" name="custom_amount" class="form-input" placeholder="e.g. 1500">
                    </div>

                    <!-- UPI Payment Section (Only option) -->
                    <h3 style="font-family:'Poppins', sans-serif; color: var(--secondary-color); margin-bottom: 15px; margin-top: 30px;">UPI Payment Details</h3>
                    
                    <div class="form-group">
                        <label class="form-label">Enter UPI ID / VPA</label>
                        <input type="text" name="upi_id" class="form-input" placeholder="username@upi (e.g. john@okicici)" required>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <p style="font-size: 0.9em; color: #777; margin-bottom: 5px;">Supported Apps:</p>
                        <div class="upi-apps-icon">
                            <span class="upi-badge">GPay</span>
                            <span class="upi-badge">PhonePe</span>
                            <span class="upi-badge">Paytm</span>
                            <span class="upi-badge">BHIM</span>
                        </div>
                    </div>

                    <!-- Personal Message -->
                    <div style="margin-top: 30px; margin-bottom: 20px; border-top: 2px solid #eee; padding-top: 20px;">
                        <div class="form-group">
                            <label class="form-label">Personal Message (Optional)</label>
                            <textarea name="message" class="form-input" rows="3" placeholder="Write a message of support..." style="resize: vertical; font-family: 'Lato', sans-serif;"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="button btn-block">Donate via UPI</button>
                </form>
            </div>

            <!-- Right Column: Impact Info -->
            <div>
                <!-- Impact Card (Using Secondary Blue Theme Color) -->
                <div class="donate-card" style="background-color: var(--secondary-color); color: white;">
                    <h3 style="font-family:'Poppins', sans-serif; margin-top:0; color: white;">Why Donate?</h3>
                    <p style="color: #ecf0f1;">We are a non-profit organization. 100% of your donations go directly to animal care.</p>
                    
                    <ul class="impact-list">
                        <li><strong>₹500</strong> feeds a shelter dog for a week.</li>
                        <li><strong>₹1000</strong> provides essential vaccinations.</li>
                        <li><strong>₹2500</strong> funds a spay/neuter surgery.</li>
                        <li><strong>₹5000</strong> provides emergency medical care.</li>
                    </ul>
                </div>

                <!-- Security Badge -->
                <div class="donate-card" style="margin-top: 30px; text-align: center;">
                    <i class="fas fa-shield-alt" style="font-size: 3em; color: var(--primary-color); margin-bottom: 15px;"></i>
                    <h4 style="margin:0; font-family:'Poppins', sans-serif; color: var(--secondary-color);">Secure Donation</h4>
                    <p style="font-size: 0.9em; color: var(--text-light);">Your payment information is encrypted and processed securely.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Paws & Claws. A simple website for learning.</p>
    </footer>

</body>
</html>