    <?php include("header.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Our Pets</title>
    
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
            padding: 10px 25px;
            font-size: 1em;
            font-weight: bold;
            color: var(--white);
            background-color: var(--primary-color);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }
        .button:hover { background-color: var(--primary-dark); transform: translateY(-2px); }

      
        
      
        .browse-hero {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url('https://static2.bigstockphoto.com/3/5/3/large1500/353138717.jpg') no-repeat center center/cover;
            color: var(--white);
            padding: 60px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .browse-hero h1 { font-family: 'Poppins', sans-serif; font-size: 3em; margin-bottom: 10px; margin-top: 0; }

     
        .pet-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* FIXED — 2 COLUMNS */
    gap: 30px;
}


        .pet-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }
        
        .pet-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .pet-img-container {
            height: 250px;
            overflow: hidden;
            position: relative;
        }
        
        .pet-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .pet-card:hover .pet-img-container img {
            transform: scale(1.1);
        }

        .pet-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,0,0,0.6);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
        }

        .pet-info {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .pet-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.4em;
            color: var(--secondary-color);
            margin: 0 0 5px 0;
        }

        .pet-details {
            color: var(--text-light);
            font-size: 0.95em;
            margin-bottom: 15px;
        }

        .pet-tags {
            margin-bottom: 20px;
        }

        .tag {
            background-color: #e8f4fc;
            color: var(--primary-color);
            padding: 4px 10px;
            border-radius: 5px;
            font-size: 0.8em;
            margin-right: 5px;
            font-weight: bold;
        }

        .pet-footer {
            margin-top: auto; /* Pushes button to bottom */
        }

    </style>
</head>
<body>


    <!-- Hero Section -->
    <div class="browse-hero">
        <div class="container">
            <h1>Meet Your Future Best Friend</h1>
            <p style="font-size: 1.2em;">Thousands of homeless pets are waiting for a loving family like yours.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">

        <!-- Pets Grid (No Filters) -->
        <div class="pet-grid">
            
            <!-- Pet Card 1 -->
            <div class="pet-card">
                <div class="pet-img-container">
                    <span class="pet-badge">3 Years</span>
                    <img src="hc1.jpg" alt="Dog">
                </div>
                <div class="pet-info">
                    <h3 class="pet-name">Buddy</h3>
                    <p class="pet-details"> Male</p>
                    <div class="pet-tags">
                        <span class="tag">Friendly</span>
                        <span class="tag">Active</span>
                    </div>
                    <div class="pet-footer">
                        <a href="buddy1.php" class="button">Know more</a>
                    </div>
                </div>
            </div>

            <!-- Pet Card 2 -->
            <div class="pet-card">
                <div class="pet-img-container">
                    <span class="pet-badge">1 Year</span>
                    <img src="cat.webp" alt="Cat">
                </div>
                <div class="pet-info">
                    <h3 class="pet-name">Luna</h3>
                    <p class="pet-details">  Female</p>
                    <div class="pet-tags">
                        <span class="tag">Calm</span>
                        <span class="tag">Indoor</span>
                    </div>
                    <div class="pet-footer">
                        <a href="luna.php" class="button">Know more</a>
                    </div>
                </div>
            </div>

            <!-- Pet Card 3 -->
            <div class="pet-card">
                <div class="pet-img-container">
                    <span class="pet-badge">5 Months</span>
                    <img src="max.webp" alt="Puppy">
                </div>
                <div class="pet-info">
                    <h3 class="pet-name">Max</h3>
                    <p class="pet-details"> Male</p>
                    <div class="pet-tags">
                        <span class="tag">Playful</span>
                        <span class="tag">Good with Kids</span>
                    </div>
                    <div class="pet-footer">
                        <a href="max.php" class="button">Know more</a>
                    </div>
                </div>
            </div>

            <!-- Pet Card 4 -->
            <div class="pet-card">
                <div class="pet-img-container">
                    <span class="pet-badge">4 Years</span>
                    <img src="cat2.jpg" alt="Cat">
                </div>
                <div class="pet-info">
                    <h3 class="pet-name">Shadow</h3>
                    <p class="pet-details"> Male</p>
                    <div class="pet-tags">
                        <span class="tag">Independent</span>
                        <span class="tag">House Trained</span>
                    </div>
                    <div class="pet-footer">
                        <a href="shadow.php" class="button">Know more</a>
                    </div>
                </div>
            </div>

             <!-- Pet Card 5 -->
             <div class="pet-card">
                <div class="pet-img-container">
                    <span class="pet-badge">2 Years</span>
                    <img src="b.jpeg" alt="Dog">
                </div>
                <div class="pet-info">
                    <h3 class="pet-name">Daisy</h3>
                    <p class="pet-details">Female</p>
                    <div class="pet-tags">
                        <span class="tag">Curious</span>
                        <span class="tag">Vocal</span>
                    </div>
                    <div class="pet-footer">
                        <a href="daisy.php" class="button">Know more</a>
                    </div>
                </div>
            </div>

            <!-- Pet Card 6 -->
            <div class="pet-card">
                <div class="pet-img-container">
                    <span class="pet-badge">6 Years</span>
                    <img src="co.jpg" alt="Cat">
                </div>
                <div class="pet-info">
                    <h3 class="pet-name">Coco</h3>
                    <p class="pet-details"> Female</p>
                    <div class="pet-tags">
                        <span class="tag">Fluffy</span>
                        <span class="tag">Relaxed</span>
                    </div>
                    <div class="pet-footer">
                        <a href="coco.php" class="button">Know more</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer>
    <p>Paws & Claws — Because every animal deserves a safe, loving home.</p>
    <p>&copy; 2025 Paws & Claws | All Rights Reserved</p>
</footer>


</body>
</html>