<?php
// Include your database connection file
require '../../config.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $profileCodeId = $_POST['profile_code_id'];
    $profilePanelId = $_POST['profile_panel_id'];
    $codeHeading = $_POST['code_heading'];
    $code = $_POST['code'];

    // Prepare and execute SQL query to update profile code
    $sql = "UPDATE profile_codes SET profile_panel_id = '$profilePanelId', code_heading = '$codeHeading', code = '$code' WHERE id = $profileCodeId";
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
}
?>
