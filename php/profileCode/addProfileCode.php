<?php
// Include your database connection file
require '../../config.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $profilePanelId = $_POST['profile_panel_id'];
    $codeHeading = $_POST['code_heading'];
    $code = $_POST['code'];

    // Prepare and execute SQL query to insert profile code
    $sql = "INSERT INTO profile_codes (profile_panel_id, code_heading, code) VALUES ('$profilePanelId', '$codeHeading', '$code')";
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
