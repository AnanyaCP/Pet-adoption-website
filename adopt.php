    <?php include("header.php"); ?>

<?php
// Auto-fill pet name when user clicks "Adopt Simba" or similar
$pet_name = "";
if (isset($_GET['pet'])) {
    $pet_name = $_GET['pet'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws - Adoption Application</title>
    
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
            transition: 0.3s;
        }
        nav a:hover, nav a.active { background-color: var(--primary-color); color: var(--white); }

        .adopt-hero {
            background: linear-gradient(rgba(44,62,80,0.7), rgba(44,62,80,0.7)), url('https://static2.bigstockphoto.com/3/5/3/large1500/353138717.jpg') no-repeat center/cover;
            color: var(--white);
            padding: 80px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .adopt-hero h1 { font-family: 'Poppins', sans-serif; font-size: 3em; margin-bottom: 10px; }

        .container { max-width: 1200px; margin: auto; padding: 0 20px; }
        .application-container { display: flex; justify-content: center; padding-bottom: 60px; }
        .form-box {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            max-width: 800px;
            width: 100%;
        }
        .form-group { margin-bottom: 20px; }
        .form-label { font-weight: bold; margin-bottom: 8px; display: block; }
        .form-input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        textarea.form-input { resize: vertical; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-section-title { font-size: 1.3em; margin: 20px 0 10px; color: var(--primary-color); }
        .button {
            width: 100%; padding: 12px; margin-top: 20px; background: var(--primary-color);
            color: white; border: none; border-radius: 8px; cursor: pointer;
        }
        footer { background: var(--secondary-color); color: #ccc; padding: 30px; text-align: center; margin-top: auto; }
    </style>
</head>
<body>


<div class="adopt-hero">
    <h1>Find Your Perfect Match</h1>
    <p>Fill out the application to start your adoption journey.</p>
</div>

<div class="container application-container">
    <div class="form-box">
        <h2 style="text-align:center;">Adoption Application</h2>

        <form action="adopt_handler.php" method="POST">

            <!-- PET NAME AUTO-FILLED -->
            <div class="form-section-title"> Pet Interest</div>
            <div class="form-group">
                <label class="form-label">Pet Name</label>
                <input type="text" name="pet_name" class="form-input"
                       value="<?php echo $pet_name; ?>"
                       placeholder="e.g. Simba" required>
            </div>

            <!-- PERSONAL DETAILS -->
            <div class="form-section-title"> Your Details</div>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" class="form-input" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-input" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-input" required></textarea>
            </div>

            <!-- HOME DETAILS -->
            <div class="form-section-title"> Household Information</div>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Dwelling Type</label>
                    <select name="dwelling_type" class="form-input">
                        <option>House</option>
                        <option>Apartment</option>
                        <option>Farm</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Own or Rent?</label>
                    <select name="own_rent" class="form-input">
                        <option>Own</option>
                        <option>Rent</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Landlord Permission</label>
                <select name="landlord_permission" class="form-input">
                    <option>Yes</option>
                    <option>No</option>
                    <option>Not Applicable</option>
                </select>
            </div>

            <!-- EXPERIENCE -->
            <div class="form-section-title">Experience</div>

            <div class="form-group">
                <label class="form-label">Do you have other pets?</label>
                <textarea name="current_pets" class="form-input"></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">How many hours will the pet be alone?</label>
                <input type="text" name="hours_alone" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Sleeping Arrangements</label>
                <input type="text" name="sleeping_arrangements" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Why do you want to adopt?</label>
                <textarea name="reason" class="form-input" required></textarea>
            </div>

            <button type="submit" class="button">Submit Application</button>
        </form>
    </div>
</div>


     <footer>
    <p>Paws & Claws — Because every animal deserves a safe, loving home.</p>
    <p>&copy; 2025 Paws & Claws | All Rights Reserved</p>


</footer>

</body>
</html>
