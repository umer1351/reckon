<?php
// Include your database connection file
require '../../config.php';

// Check if profile code ID is provided in the URL
if(isset($_GET['id'])) {
    $profileCodeId = $_GET['id'];

    // Prepare and execute SQL query to fetch profile code details
    $sql = "SELECT * FROM profile_codes WHERE id = $profileCodeId";
    $result = mysqli_query($link, $sql);

    // Check if the query was successful
    if($result && mysqli_num_rows($result) > 0) {
        // Fetch and return profile code details
        $profileCode = mysqli_fetch_assoc($result);
        echo json_encode($profileCode);
    } else {
        // No profile code found with the provided ID
        echo json_encode(array('error' => 'Profile code not found'));
    }
} else {
    // No profile code ID provided in the URL
    echo json_encode(array('error' => 'Profile code ID not provided'));
}
?>
