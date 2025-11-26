    <?php include("header.php"); ?>
<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (fullname, email, subject, message)
            VALUES ('$fullname', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message Sent Successfully!');</script>";
    } else {
        echo "<script>alert('Error: Unable to send message');</script>";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Contact Us</title>
    
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
        
        textarea.form-input {
            resize: vertical;
            min-height: 120px;
        }

       
        
        
        .contact-hero {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url('https://static2.bigstockphoto.com/3/5/3/large1500/353138717.jpg') no-repeat center center/cover;
            color: var(--white);
            padding: 80px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .contact-hero h1 { font-family: 'Poppins', sans-serif; font-size: 3em; margin-bottom: 10px; }

        
        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 2fr; /* Sidebar takes 1 part, Form takes 2 parts */
            gap: 40px;
            margin-bottom: 60px;
        }

        @media (max-width: 768px) {
            .contact-layout {
                grid-template-columns: 1fr; /* Stack on mobile */
            }
        }

    
        .info-card {
            background: var(--secondary-color);
            color: white;
            padding: 40px;
            border-radius: 15px;
            height: fit-content;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .info-icon {
            background: rgba(255,255,255,0.1);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            margin-right: 20px;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .info-text h4 { margin: 0 0 5px 0; font-family: 'Poppins', sans-serif; font-size: 1.1em; }
        .info-text p { margin: 0; color: #ccc; font-size: 0.95em; }
        .info-text a { color: #ccc; text-decoration: none; transition: 0.3s; }
        .info-text a:hover { color: var(--white); }

       
        .contact-form-box {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .form-header {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8em;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 20px;
            margin-top: 0;
        }
    </style>
</head>
<body>

   

    <!-- Hero Section -->
    <div class="contact-hero">
        <div class="container">
            <h1>Get in Touch</h1>
            <p style="font-size: 1.2em; max-width: 700px; margin: 0 auto;">Have questions about adoption, volunteering, or donating? We're here to help!</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="contact-layout">
            
            <!-- Left Column: Contact Information -->
            <aside class="info-card">
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-text">
                        <h4>Our Location</h4>
                        <p>123 Pet Street, Animal Shelter District<br>Bangalore, Karnataka 560089</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info-text">
                        <h4>Phone Number</h4>
                        <p><a href="tel:+919876543210">+91 98765 43210</a></p>
                        <p><a href="tel:+911122334455">+91 11 2233 4455</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-text">
                        <h4>Email Address</h4>
                        <p><a href="mailto:support@pawsclaws.com">support@pawsclaws.com</a></p>
                        <p><a href="mailto:adopt@pawsclaws.com">adopt@pawsclaws.com</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-clock"></i></div>
                    <div class="info-text">
                        <h4>Visiting Hours</h4>
                        <p>Mon - Fri: 10:00 AM - 6:00 PM</p>
                        <p>Sat - Sun: 11:00 AM - 4:00 PM</p>
                    </div>
                </div>
                
    
            </aside>

            <!-- Right Column: Contact Form -->
            <div class="contact-form-box">
                <h2 class="form-header">Send us a Message</h2>
                <form action=" " method="POST">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-input" placeholder="Your Name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input" placeholder="you@example.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Subject</label>
                        <select name="subject" class="form-input">
                            <option>Adoption Inquiry</option>
                            <option>Volunteering</option>
                            <option>Donation Question</option>
                            <option>Report a Stray</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-input" placeholder="How can we help you?" required></textarea>
                    </div>

                    <button type="submit" class="button btn-block">Send Message</button>
                </form>
            </div>

        </div>
    </div>

     <footer>
    <p>Paws & Claws — Because every animal deserves a safe, loving home.</p>
    <p>&copy; 2025 Paws & Claws | All Rights Reserved</p>
</footer>


</body>
</html>