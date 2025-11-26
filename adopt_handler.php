<?php
session_start();
include("db.php");

// User must be logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first to submit adoption request.'); window.location='login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

// Get form inputs
$pet_name = $_POST['pet_name'];
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$dwelling_type = $_POST['dwelling_type'];
$own_rent = $_POST['own_rent'];
$landlord_permission = $_POST['landlord_permission'];

$adults_count = $_POST['adults_count'];
$children_count = $_POST['children_count'];

$current_pets = $_POST['current_pets'];
$hours_alone = $_POST['hours_alone'];
$sleeping_arrangements = $_POST['sleeping_arrangements'];

$reason = $_POST['reason'];

// Insert into database
$sql = "INSERT INTO adoptions (
            user_id, pet_name, fullname, age, email, phone, address,
            dwelling_type, own_rent, landlord_permission,
            adults_count, children_count,
            current_pets, hours_alone, sleeping_arrangements,
            reason, status
        ) VALUES (
            '$user_id', '$pet_name', '$fullname', '$age', '$email', '$phone', '$address',
            '$dwelling_type', '$own_rent', '$landlord_permission',
            '$adults_count', '$children_count',
            '$current_pets', '$hours_alone', '$sleeping_arrangements',
            '$reason', 'Pending'
        )";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Your adoption application has been submitted successfully!');
            window.location='profile.php';
          </script>";
} 
else {
    echo "ERROR: " . mysqli_error($conn);
}
?>
