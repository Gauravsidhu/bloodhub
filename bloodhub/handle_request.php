<?php
session_start();

if (isset($_POST['blood_type'], $_POST['hospital_name'])) {
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== 'hospital') {
        // Retrieve the user data for the receiver who is requesting the sample
        $requestData = $_POST;
        $requestData['user_name'] = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "";
        $requestData['user_email'] = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "";
        $_SESSION['request_data'] = $requestData;
        echo "Request data stored.";
    } else {
        echo "You do not have permission to request a sample.";
    }
} else {
    echo "Incomplete request data.";
}
?>
