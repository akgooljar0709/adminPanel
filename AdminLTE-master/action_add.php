<?php
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$insert = $db->insert("booking", [
   "customer_name"     => $_POST['customer_name'],
   "plate_number" => $_POST['car_plate_no'],
   "date" => $_POST['date'],
   "time_in"      => $_POST['time_in'],
   "time_out"    => $_POST['time_out'],
   "date"    => $_POST['date'],
   "status"    => "Active"
]);

echo "<script>alert('Registered successfully');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

