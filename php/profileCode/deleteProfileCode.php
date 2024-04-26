<?php
// Include your database connection file
require '../../config.php';

// Handle the deletion of the profile code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if profile code ID is provided
    if(isset($_POST['profile_code_id'])) {
        $profileCodeId = $_POST['profile_code_id'];

        // Prepare and execute SQL query to delete the profile code
        $sql = "DELETE FROM profile_codes WHERE id = $profileCodeId";
        $result = mysqli_query($link, $sql);

        // Check if the query was successful
        if($result) {
            // Return success message or any data if needed
            echo json_encode(array('success' => true));
        } else {
            // Error executing the query
            http_response_code(500);
            echo json_encode(array('success' => false, 'error' => mysqli_error($link)));
        }
    } else {
        // Profile code ID not provided
        http_response_code(400);
        echo json_encode(array('success' => false, 'error' => 'Profile code ID not provided'));
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array('success' => false, 'error' => 'Invalid request method'));
}
?>
