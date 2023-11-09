<?php
include("config.php"); // Include your Firebase configuration
include("firebaseRDB.php"); // Include your Firebase Realtime Database class

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have the insert function and FirebaseRDB class loaded

    // Create an instance of the FirebaseRDB class
    $db = new firebaseRDB($databaseURL);

    // Prepare the data to insert
    $data = [
        "email" => $_POST['email'],
        "password" => md5($_POST['password']) // Remember, using md5 for password hashing is not secure
    ];

    // Insert data into the "admin" node under "bookings"
    $insertResult = $db->insert("bookings/admin", $data);

    if ($insertResult) {
        echo "User added successfully.";
    } else {
        echo "Failed to add user.";
    }
}
?>
