<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("config.php"); // Include your Firebase configuration
    include("firebaseRDB.php"); // Include your Firebase Realtime Database class
    
    // Create an instance of the FirebaseRDB class
    $db = new firebaseRDB($databaseURL);
    
    // Retrieve the user's email from the form
    $email = $_POST['email'];
    
    // Retrieve admin data using the email as the filter
    $admins = $db->retrieve("bookings/admin", "email", "EQUAL", $email);
    
    if ($admins) {
    print_r($admins); // Debugging: Output retrieved admin data

    // Assuming you only have one admin with the given email
    $adminData = reset($admins);
    
    // Hash the provided password for comparison
    $providedPassword = $_POST['password'];
    $storedHashedPassword = $adminData['password'];
    
    // Compare the stored and provided hashed passwords
    if ($storedHashedPassword === md5($providedPassword)) {
        // Redirect to index.php on successful login
        header("Location: index.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Login failed.";
    }
} else {
    echo "User not found.";
}

}
?>
