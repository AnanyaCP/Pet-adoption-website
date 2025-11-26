
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php include("header.php"); ?>
    <!-- Main Content -->
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-text">
                <h1>Find Your<br>New Best Friend.</h1>
                <p>We connect loving families with pets who need a home. Start your journey to find a loyal companion today.</p>
                <a href="ourpets.php" class="button">Meet The Pets</a>
            </div>
            <div class="hero-image">
                <img src="hd1.jpg" alt="A happy dog">
            </div>
        </div>
    </div>

    <!-- Featured Pet Section -->
    <div class="section" style="background-color: var(--white);">
        <div class="container">
            <h2 class="section-title">Pet of the Month</h2>
            <div class="featured-pet-card">
                <img src="hc1.jpg" alt="Dog named Buddy">
                <div class="featured-pet-content">
                    <h3>Meet Buddy!</h3>
                    <p>Simba is a 2-year-old orange tabby with a playful spirit and a love for cozy corners. He enjoys chasing sunbeams, pouncing on feather toys, and curling up beside you for evening cuddles. Could you be his forever family?</p>
                    <a href="buddy1.php" class="button">Learn More About Buddy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="section">
        <div class="container">
            <h2 class="section-title">Adoption Made Simple</h2>
            <div class="process-container">
                <div class="process-step">
                    <div class="icon"><i class="fas fa-search"></i></div>
                    <h3>1. Browse Pets</h3>
                    <p>Look through our gallery of adorable pets who are waiting for a loving family.</p>
                </div>
                <div class="process-step">
                    <div class="icon"><i class="fas fa-file-alt"></i></div>
                    <h3>2. Apply to Adopt</h3>
                    <p>Fill out our simple adoption form to let us know you're interested.</p>
                </div>
                <div class="process-step">
                    <div class="icon"><i class="fas fa-heart"></i></div>
                    <h3>3. Support Us</h3>
                    <p>Make a donation to help us care for more animals in need.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories Section -->
    <div class="section" style="background-color: var(--white);">
        <div class="container">
            <h2 class="section-title">Happy Tails: Success Stories</h2>
            <div class="stories-container">
                <div class="story-card">
                    <img src="luck.jpg" alt="Dog with his new family">
                    <div class="content">
                        <p>"Adopting lucky was the best decision we've ever made. He brings so much joy to our home!"</p>
                        <p class="adopter-name">- Shreya</p>
                    </div>
                </div>
                <div class="story-card">
                    <img src="goldie.webp" alt="Cat sleeping in a cozy spot">
                    <div class="content">
                        <p>Arjun welcomed zavier, a golden retriever, into his life and now volunteers every weekend. “he healed parts of me I didn’t know were broken,” he shares.</p>
                        <p class="adopter-name">- Arjun</p>
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

