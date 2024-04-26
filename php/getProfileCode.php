<?php
// Assuming you have included your database connection file here
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['profilePanelId'])) {
    // Sanitize the input to prevent SQL injection
    $profilePanelId = mysqli_real_escape_string($link, $_POST['profilePanelId']);
    $codeHeading = mysqli_real_escape_string($link, $_POST['codeHeading']);
    // Query to fetch the profile code based on the profile_panel_id"
    $sql = "SELECT code FROM profile_codes WHERE profile_panel_id = '$profilePanelId' AND code_heading = '".$codeHeading."'" ;
    $result = mysqli_query($link, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $profileCode = $row['code'];

            // Return the profile code as JSON
            echo json_encode(array('success' => true, 'code' => $profileCode));
            exit;
        } else {
            // No matching profile code found
            echo json_encode(array('success' => false, 'message' => 'Profile code not found'));
            exit;
        }
    } else {
        // Error in executing the query
        echo json_encode(array('success' => false, 'message' => 'Error in fetching profile code'));
        exit;
    }
} else {
    // Invalid request
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit;
}
?>
