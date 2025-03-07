<?php
require 'db_connect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $surname = $_POST['surname'];
    $phone_number = $_POST['phone_number'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $email = $_POST['mail'];
    $dob = $_POST['dob'];
    $nin = $_POST['nin'];
    $bvn = $_POST['bvn'];
    $home_address = $_POST['home_address'];
    $community = $_POST['community'];
    $ward = $_POST['ward'];
    $lga = $_POST['lga'];
    $production_type = $_POST['production_type'];
    $production_crop = $_POST['production_crop'];
    $processing = $_POST['processing'];
    $marketing = $_POST['marketing'];
    $farm_address = $_POST['farm_address'];
    $farm_ward = $_POST['farm_ward'];
    $farm_lga = $_POST['farm_lga'];
    $farm_coord = $_POST['farm_coord'];
    $next_crop = $_POST['next_crop'];
    $associate_belong = $_POST['associate_belong'];
    $land_size = $_POST['land_size'];
    $isLoan = $_POST['isLoan'];
    $acct_num = $_POST['acct_num'];
    $bank_name = $_POST['bank_name'];
    $acct_name = $_POST['acct_name'];
    $membership_category = $_POST['membership_category'];

    // Handle file uploads
    $idCard = $_FILES['idCard']['name'];
    $passport = $_FILES['passport']['name'];
    $upload_dir = "uploads/";

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $idCardPath = $upload_dir . basename($_FILES["idCard"]["name"]);
    $passportPath = $upload_dir . basename($_FILES["passport"]["name"]);

    move_uploaded_file($_FILES["idCard"]["tmp_name"], $idCardPath);
    move_uploaded_file($_FILES["passport"]["tmp_name"], $passportPath);

    // Insert into database
    $sql = "INSERT INTO registrations (first_name, middle_name, surname, phone_number, whatsapp_number, email, dob, nin, bvn, home_address, community, ward, lga, production_type, production_crop, processing, marketing, farm_address, farm_ward, farm_lga, farm_coord, next_crop, associate_belong, land_size, isLoan, acct_num, bank_name, acct_name, membership_category, idCard, passport) 
    VALUES ('$first_name', '$middle_name', '$surname', '$phone_number', '$whatsapp_number', '$email', '$dob', '$nin', '$bvn', '$home_address', '$community', '$ward', '$lga', '$production_type', '$production_crop', '$processing', '$marketing', '$farm_address', '$farm_ward', '$farm_lga', '$farm_coord', '$next_crop', '$associate_belong', '$land_size', '$isLoan', '$acct_num', '$bank_name', '$acct_name', '$membership_category', '$idCard', '$passport')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>