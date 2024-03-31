<?php
session_start();

// Check if the user is logged in and if the session contains the request data
if (isset($_SESSION['request_data'])) {
    // Retrieve the request data from the session
    $request = $_SESSION['request_data'];
    
    // Display the request data
    echo "Blood Type: " . $request['blood_type'] . "<br>";
    echo "Hospital Name: " . $request['hospital_name'] . "<br>";

    // Check if the user name and email are set in the session
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
        // Display the user name and email
        echo "User Name: " . $_SESSION['user_name'] . "<br>";
        echo "User Email: " . $_SESSION['user_email'] . "<br>";
    } else {
        echo "User information not found.<br>";
    }
} else {
    echo "No request data found.<br>";
}
?>
