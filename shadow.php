<?php include("header.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Shadow</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- INTERNAL CSS (Blue Theme) -->
    <style>
       
        :root {
            --primary-color: #3498db;
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
            transition: 0.3s;
        }
        nav a:hover { background-color: var(--primary-color); color: var(--white); }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

       
        .pet-detail-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            padding: 60px 0;
            background: var(--white);
            margin-top: 30px;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            padding: 40px;
        }

        @media (max-width: 768px) {
            .pet-detail-wrapper { grid-template-columns: 1fr; }
        }

        .pet-image-gallery img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            height: 400px;
            object-fit: cover;
        }

        .pet-info h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 3em;
            color: var(--secondary-color);
            margin-bottom: 10px;
            margin-top: 0;
        }

        .pet-breed {
            font-size: 1.2em;
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
        }

        .pet-stats {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }

        .stat-box {
            text-align: center;
            flex: 1;
            border-right: 1px solid #eee;
        }
        .stat-box:last-child { border-right: none; }

        .stat-label { font-size: 0.85em; color: #888; display: block; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px; }
        .stat-value { font-weight: bold; font-size: 1.1em; color: var(--secondary-color); }

        .pet-description {
            line-height: 1.8;
            color: var(--text-light);
            margin-bottom: 30px;
            font-size: 1.05em;
        }

        .button {
            display: inline-block;
            padding: 15px 35px;
            font-size: 1.1em;
            font-weight: bold;
            color: var(--white);
            background-color: var(--primary-color);
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
            text-align: center;
        }
        .button:hover { background-color: #2980b9; transform: translateY(-2px); }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--secondary-color);
            border: 2px solid var(--secondary-color);
            margin-left: 15px;
        }
        .btn-secondary:hover { background-color: var(--secondary-color); color: white; }

        footer { text-align: center; padding: 40px; background: var(--secondary-color); color: #ccc; margin-top: auto;}
    </style>
</head>
<body>

    

    <div class="container">
        <!-- Breadcrumb -->
        <p style="margin-top: 30px; color: #777;">
            <a href="browse.html" style="color: #777; text-decoration: none;">Pets</a> 
            <i class="fas fa-chevron-right" style="font-size: 0.8em; margin: 0 10px;"></i> 
            <span style="color: var(--primary-color); font-weight: bold;">Shadow</span>
        </p>

        <div class="pet-detail-wrapper">
            <!-- Left: Image -->
            <div class="pet-image-gallery">
                <img src="cat2.jpg" alt="Shadow the Cat">
            </div>

            <!-- Right: Info -->
            <div class="pet-info">
                <h1>Shadow</h1>
                <span class="pet-breed">Domestic Shorthair • 4 Years Old</span>
                
                <div class="pet-stats">
                    <div class="stat-box">
                        <span class="stat-label">Gender</span>
                        <span class="stat-value">Male</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-label">Size</span>
                        <span class="stat-value">Medium</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-label">Vaccinated</span>
                        <span class="stat-value" style="color: #27ae60;">Yes <i class="fas fa-check-circle"></i></span>
                    </div>
                </div>

                <div class="pet-description">
                    <p>Shadow is a calm and independent spirit who enjoys his own company but never turns down a good head scratch. He is fully house-trained and has impeccable manners. Shadow is perfect for a busy professional or a quiet home.</p>
                    <p>While he isn't a lap cat 24/7, he will be your loyal shadow, following you from room to room and keeping you company while you work or relax.</p>
                </div>

                <div style="display: flex; align-items: center;">
                    <!-- Auto-fills application with 'Shadow' -->
                    <a href="adopt.php?pet=Shadow" class="button">Adopt Shadow</a>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Paws & Claws. A simple website for learning.</p>
    </footer>

</body>
</html>